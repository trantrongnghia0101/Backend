<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // $keyword = $request->get('q');
        $brands = new Brand();
        $categories = new Category();
        return view('home', [
            'product' => Product::all(),
            'categories' => $categories::orderBy('id', 'desc')->get(),
            'brands' => $brands::orderBy('id', 'desc')->get(),
        ]);
        // return view('store');
        // dd(Product::all());
        // return response()->json([
        //     // 'test' =>Product::orderBy('id','desc')->take(8)->get(),
        //     'product' =>  Product::all(),
        // ],200);
    }
    public function create()
    {
        $brands = new Brand();
        $categories = new Category();
        return view('store', [
            'categories' => $categories::orderBy('id', 'desc')->get(),
            'brands' => $brands::orderBy('id', 'desc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        //Lưu vào trong public//
        // dd($request->all());
        $object = new Product();
        $fileName = $request->file('image')->getClientOriginalName();
        $object->fill($request->except('image'));
        $object->image = $fileName;
        $object->save();
        $request->file('image')->move('imgs', $fileName);

        // lưu trong storage//
        // $path =  $request->file('image')->store('/imgs');
       
        // return redirect()->route('admin.product');
    }

        public function edit(Product $product)
        {
            return view('edit', [
                'product' => $product,
            ]);
        }
    
    public function update(Product $product, Request $request)
    {
      
        $input = $request->all();
        if ($request->file('image') == null) {
            unset($input['image']);
        } else {
            $fileName = $request->file('image')->getClientOriginalName();

            $input['image'] = $fileName;
            $request->file('image')->move('imgs',  $fileName);
        }
        $product->update($input);

        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product');
    }
}
