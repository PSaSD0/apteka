<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WebController extends controller
{
   public function home()
    {
        $array = DB::table("product")->limit(5)->get();
        return view('index', data: compact('array'));
    }
    public function catalog()
    {
        $array = DB::table('product')->get();
        return view('catalog', compact('array'));
    }
    public function product($id)
    {
        $product = DB::table('product')->where('id_product','=',$id)->first();
        return view('product', compact('product'));
    }
    public function profile()
    {
        return view('profile');
    }
    public function admin()
    {
        $categories = DB::table('category')->get();
        return view('admin', compact('categories'));
    }
    public function addCategory(Request $request)
    {
        DB::table('category')->insert(['category_name'=>$request->nameCategory]);
        return redirect()->back()->with('messageAddCategory', 'Категория успешно добавлена');
    }
    public function dellCategory(Request $request)
    {
        DB::table('category')->where('id_category','=',$request->id_category)->delete();
        return redirect()->back()->with('messageDellCategory', 'Категория успешно удалена');
    }
    public function addProduct(Request $request)
    {
        $path = $request->file('image')->store('assets/img', 'public');
        $request->file('image')->move(public_path('assets/img/'), $path);

        DB::table('product')->insert([
            'product_name' => $request->nameProduct,
            'product_description' => $request->descriptionProduct,
            'id_category' => $request->id_category,
            'product_producer' => $request->productProducer,
            'product_active_substance' => $request->productActiveSubstance,
            'product_expiration_date' => $request->productExpirationDate,
            'price' => $request->costProduct,
            'image' => $path,
        ]);

        return redirect()->back()->with('messageAddProduct', 'Товар успешно добавлен');
    }
}
