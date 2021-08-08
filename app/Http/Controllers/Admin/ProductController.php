<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'List of Products';
        // $data['products'] = Product::paginate();
        $data['products'] = Product::with('category')->orderBy('id','DESC')->paginate(5);
        return view('admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create new Product';
        $data['categories'] = Category::all();
        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpeg,png'
        ]);
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->status = $request->status;
        $product->stock = $request->stock;
        if($request->hasFile('image')){
            $image_path = $this->fileUpload($request->file('image'));
            $product->image = $image_path;
        }
        $product->save();
        session()->flash('success','Product created successfully');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data['title'] = 'Edit Product';
        $data['categories'] = Category::all();
        $data['product'] = $product;
        return view('admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpeg,png'
        ]);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->price = $request->price;
        // $product->image = $request->image;
        $product->status = $request->status;
        $product->stock = $request->stock;
        if($request->hasFile('image')){
            $image_path = $this->fileUpload($request->file('image'));
            if($product->image != null && file_exists($product->image)){
                unlink($product->image);
            }

            $product->image = $image_path;
        }


        $product->save();
        session()->flash('success','Product updated successfully');
        return redirect()->route('product.index');
    }

    private function fileUpload($img){
        $path = 'images/product';
        $file_name = rand(0000,9999).'_'.$img->getFilename().'.'.$img->getClientOriginalExtension();
        $img->move($path,$file_name);
        return $path.'/'.$file_name;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->image != null && file_exists($product->image)){
            unlink($product->image);
        }
        $product->delete();
        session()->flash('success','Product deleted successfully');
        return redirect()->route('product.index');
    }
}
