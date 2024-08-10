<?php

namespace App\Http\Controllers;

use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        if (strlen($keyword)) {
            $products = Product::where('name', 'like', "%$keyword%")->get();
        } else {
            $products = DB::table('products')
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
        ], [
            'name.required' => 'Name must be filled in',
            'price.required' => 'Price must be filled in',
            'image.required' => 'Image must be filled in',
            'image.image' => 'File must be an image',
        ]);

        $data = Product::create($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move('images/products/', $imageName);
            $data->image = $imageName;
            $data->save();
        }

        Alert::success('Success', 'Update data is success');
        return redirect('product');
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
    public function edit($id)
    {
        $data = Product::where('id', $id)->first();
        return view('products.update')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ], [
            'name.required' => 'Name must be filled in',
            'price.required' => 'Price must be filled in',
        ]);

        Product::where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        Alert::success('Success', 'Update data is success');
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->to('product')->with('success', 'Deleted product is success');
    }
}
