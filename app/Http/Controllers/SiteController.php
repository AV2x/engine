<?php

namespace App\Http\Controllers;

use App\Helpers\Banner\ResizeImage;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Feedback;
use App\Models\Partner;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{

    protected $resizeImage;

    public function __construct(ResizeImage $resizeImage)
    {
        $this->resizeImage = $resizeImage;
    }

    public function banner()
    {
        return view('admin.site.index', ['banner' => Banner::first()]);
    }
    public function bannerUpdate(Request $request)
    {
        $banner = (Banner::first()) ? Banner::first() : new Banner();
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');
        if($request->hasFile('file_main')){
            $image = $request->file('file_main');
            $fileName = uniqid().'.'.'webp';
            Storage::putFileAs('/public/images/banners/origin', $image, $fileName,);
            $this->resizeImage->convert($fileName, 'main');
            $banner->file_main = $fileName;
        }
        if($request->hasFile('file_sub')){
            $image = $request->file('file_sub');
            $fileName = uniqid().'.'.'webp';
            Storage::putFileAs('/public/images/banners/origin', $image, $fileName);
            $this->resizeImage->convert($fileName, 'sub');
            $banner->file_sub = $fileName;
        }
        $banner->save();
        return back();
    }

    public function company()
    {
        return view('admin.site.company', ['company' => Company::first()]);
    }
    public function companyUpdate(Request $request)
    {
        $company = (Company::first()) ? Company::first() : new Company();
        $company->main_description = $request->input('description_main');
        $company->sub_description = $request->input('description_sub');
        $company->advantage_1_count = $request->input('advantage_1_count');
        $company->advantage_1_text = $request->input('advantage_1_text');
        $company->advantage_2_count = $request->input('advantage_2_count');
        $company->advantage_2_text = $request->input('advantage_2_text');
        $company->advantage_3_count = $request->input('advantage_3_count');
        $company->advantage_3_text = $request->input('advantage_3_text');
        $company->advantage_4_count = $request->input('advantage_4_count');
        $company->advantage_4_text = $request->input('advantage_4_text');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = uniqid().'.'.$image->getClientOriginalExtension();
            Storage::putFileAs('/public/images/company', $image, $fileName);
            $company->image = $fileName;
        }
        $company->save();
        return back();
    }

    public function contacts()
    {
        return view('admin.site.contacts', ['contacts' => Contact::get()]);
    }
    public function contactsUpdate(Request $request)
    {
        Contact::query()->delete();
        foreach ($request->input('title') as $key => $title){
            $contact = new Contact();
            $contact->title = $title;
            $contact->map = $request->input('map');
            if(isset($request->input('tel')[$key])){
                $contact->tel = $request->input('tel')[$key];
            }
            if(isset($request->input('address')[$key])){
                $contact->address = $request->input('address')[$key];
            }
            if(isset($request->input('time_job_weekday')[$key])){
                $contact->time_job_weekday = $request->input('time_job_weekday')[$key];
            }
            if(isset($request->input('time_job_weekend')[$key])){
                $contact->time_job_weekend = $request->input('time_job_weekend')[$key];
            }
            $contact->save();

        }
        return back();
    }
    public function partners()
    {
        return view('admin.site.partners', ['partners' => Partner::get()]);
    }
    public function partnersUpdate(Request $request)
    {
        $partners = Partner::get();
        if($request->hasFile('images')){
            foreach ($request->file('images') as $key => $image){
                $fileName = uniqid().'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('/public/images/partners', $image, $fileName);
                if(empty($partners[$key])){
                    Partner::create(['image' => $fileName]);
                }
                else{
                    $partners[$key]->image = $fileName;
                    $partners[$key]->save();
                }
            }
        }
        return back();
    }

    public function feedbacks()
    {
        return view('admin.site.feedbacks', ['feedbacks' => Feedback::get()]);
    }
    public function feedbacksUpdate(Request $request)
    {
        Feedback::whereNotIn('id', $request->input('id'))->delete();
        foreach ($request->input('name') as $key => $name){
            $feedack = (isset($request->input('id')[$key])) ? Feedback::find($request->input('id')[$key]) : new  Feedback();
            $feedack->name = $name;
            if(isset($request->input('text')[$key])){
                $feedack->text = $request->input('text')[$key];
            }
            if(isset($request->file('avatar')[$key])){
                $image = $request->file('avatar')[$key];
                $fileName = uniqid().'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('/public/images/avatars', $image, $fileName);
                $feedack->avatar = $fileName;
            }
            $feedack->save();

        }

        return back();
    }
    public function questions()
    {
        return view('admin.site.questions', ['questions' => Question::get()]);
    }
    public function questionsUpdate(Request $request)
    {
        Question::query()->delete();
        foreach ($request->input('questions') as $question){
            Question::create(['title' => $question['title'], 'description' => $question['text']]);
        }
        return back();
    }
}
