<?php

namespace App\Http\Controllers;

use App\Helpers\Service\ResizeImage;
use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public $service;
    public $resizeImage;

    public function __construct(Service $service, ResizeImage $resizeImage)
    {
        $this->service = $service;
        $this->resizeImage = $resizeImage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('admin.services.index', ['services' => Service::with(['prices', 'options', 'image', 'category'])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.services.create', ['categories' => Category::where('parent_id', null)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $this->service->name = $request->input('name');
        $this->service->description = $request->input('description');
        $this->service->category_id = $request->input('category_id');
        $this->service->price = $request->input('price');
        $this->service->slug = Str::slug($request->input('name'), '-', 'ru');
        $this->service->save();
        if($request->input('prices_name')){
            foreach ($request->input('prices_name') as $key => $priceName){
                if(isset($request->input('prices_value')[$key])){
                    $this->service->prices()->create(['name' => $priceName,
                        'price' => $request->input('prices_value')[$key]]);
                }
            }
        }
        if($request->input('options_name')){
            foreach ($request->input('options_name') as $key => $priceName){
                if(isset($request->input('options_value')[$key])){
                    $this->service->options()->create(['name' => $priceName,
                        'value' => $request->input('options_value')[$key]]);
                }
            }
        }
        if($request->hasFile('images')){
            foreach ($request->file('images') as $image){
                $fileName = uniqid();
                Storage::putFileAs('/public/images/services/origin', $image, $fileName.'.'.$image->getClientOriginalExtension());
                $this->service->image()->create(['filename' => $fileName.'.'.$image->getClientOriginalExtension()]);
                Storage::putFileAs('/public/images/services/origin', $image, $fileName.'.webp');
                $this->resizeImage->convert($fileName.'.webp');
            }
        }
        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $service = Service::with(['images', 'category', 'options', 'prices'])->find($service->id);
        return  view('admin.services.edit', ['categories' => Category::where('parent_id', null)->get(), 'service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service->name = $request->input('name');
        $service->description = $request->input('description');
        $service->category_id = $request->input('category_id');
        $service->price = $request->input('price');
        $service->save();
        $service->prices()->delete();
        $service->options()->delete();
        if($request->input('prices_name')){
            foreach ($request->input('prices_name') as $key => $priceName){
                if(isset($request->input('prices_value')[$key])){
                    $service->prices()->create(['name' => $priceName,
                        'price' => $request->input('prices_value')[$key]]);
                }
            }
        }
        if($request->input('options_name')){
            foreach ($request->input('options_name') as $key => $priceName){
                if(isset($request->input('options_value')[$key])){
                    $service->options()->create(['name' => $priceName,
                        'value' => $request->input('options_value')[$key]]);
                }
            }
        }
        if($request->hasFile('images')){
            $service->image()->delete();
            foreach ($request->file('images') as $image){
                $fileName = uniqid();
                Storage::putFileAs('/public/images/services/origin', $image, $fileName.'.'.$image->getClientOriginalExtension());
                $service->image()->create(['filename' => $fileName.'.'.$image->getClientOriginalExtension()]);
                Storage::putFileAs('/public/images/services/origin', $image, $fileName.'.webp');
                $this->resizeImage->convert($fileName.'.webp');
            }
        }
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index');
    }
}
