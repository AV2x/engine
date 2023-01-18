<?php

namespace App\Http\Controllers;

use App\Helpers\Product\ResizeImage;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public $product;
    public $resizeImage;

    public function __construct(Product $product, ResizeImage $resizeImage)
    {
        $this->product = $product;
        $this->resizeImage = $resizeImage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', ['categories' => Category::where('parent_id', null)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->product->name = $request->input('name');
        $this->product->description = $request->input('description');
        $this->product->category_id = $request->input('category_id');
        $this->product->price = $request->input('price');
        $this->product->slug = Str::slug($request->input('name'), '-', 'ru');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = uniqid();
            Storage::putFileAs('/public/images/products/origin', $image, $fileName.'.'.$image->getClientOriginalExtension());
            $this->product->image = $fileName.'.'.$image->getClientOriginalExtension();
            Storage::putFileAs('/public/images/products/origin', $image, $fileName.'.webp');
            $this->resizeImage->convert($fileName.'.webp');
        }
        $this->product->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', ['product' => $product, 'categories' => Category::where('parent_id', null)->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->slug = Str::slug($request->input('name'), '-', 'ru');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = uniqid();
            Storage::putFileAs('/public/images/products/origin', $image, $fileName.'.'.$image->getClientOriginalExtension());
            $product->image = $fileName.'.'.$image->getClientOriginalExtension();
            Storage::putFileAs('/public/images/products/origin', $image, $fileName.'.webp');
            $this->resizeImage->convert($fileName.'.webp');
        }
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
