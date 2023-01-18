<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Feedback;
use App\Models\Partner;
use App\Models\Question;
use App\Models\Service;
use Illuminate\Http\Request;

class SitePageController extends Controller
{
    public function index()
    {
       return view('index', [
           'banner' => Banner::first(),
           'services' => Service::get(),
           'company' => Company::first(),
           'partners' => Partner::get(),
           'feedbacks' => Feedback::get(),
           'questions' => Question::get(),
       ]);
    }

    public function services(Request $request)
    {
        $categories = new Category();
        $services = Service::limit('10');
        if($request->input('price')){
            $price = $request->input('price');
            $categories = $categories->whereHas('services', function ($query) use($price){
                $query->where('price', $price);
            });
            $services = $services->where('price', $price);
        }
        $services = $services->get();
        $categories = $categories->get();
        return view('services.index', [
            'categories' => $categories,
            'banner' => Banner::first(),
            'services' => $services,
        ]);
    }
    public function category($slug, Category $category)
    {
        $category = $category->where('slug', $slug)->first();
        return view('services.index', [
            'categories' => Category::get(),
            'category' => $category,
            'banner' => Banner::first(),
            'services' => Service::limit('10')->where('category_id', $category->id)->get(),
        ]);
    }

    public function service($category_slug, $service_slug, Service $service)
    {
        $service = $service->where('slug', $service_slug)->first();
        return view('service', [
            'service' => $service,
            'services' => Service::where('category_id', $service->category_id)->limit(5)->get(),
        ]);
    }

    public function contacts()
    {
        return view('contacts', [
            'contacts' => Contact::get()
        ]);
    }

    public function company()
    {
        return view('company', [
            'company' => Company::first()
        ]);
    }
}
