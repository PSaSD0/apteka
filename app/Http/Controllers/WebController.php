<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class WebController extends controller
{
   public function home()
    {
        $array = DB::table("product")->orderBy('id_product', 'desc')->limit(5)->get();
        $productPopylar = DB::table( "product")->inRandomOrder()->limit(3)->get();
        $productNew = DB::table( "product")->orderBy('id_product', 'desc')->limit(3)->get();
        $productDay = DB::table( "product")->inRandomOrder()->orderBy('price', 'asc')->limit(3)->get();
        $productSpecial = DB::table( "product")->inRandomOrder()->orderBy('price', 'desc')->limit(3)->get();
        $articles = DB::table('articles')->limit(3)->get();
        return view('index', data: compact('array', 'productPopylar', 'productNew', 'productDay', 'productSpecial', 'articles'));
    }
    public function articles()
    {
        $array = DB::table('articles')->get();
        return view('articles', compact('array'));
    }
    public function articlesOne($id)
    {
        $array = DB::table('articles')->where('id_articles','=',$id)->first();
        return view('articlesOne', compact('array'));
    }
    public function catalog()
    {
        $array = DB::table('product')->get();
        return view('catalog', compact('array'));
    }
    public function product($id)
    {
        $product = DB::table('product')->where('id_product','=',$id)->first();
        $array = DB::table(table: "product")->where('id_product','!=',$id)->inRandomOrder()->limit(3)->get();
        return view('product', compact('product', 'array'));
    }
    public function basket($id)
    {
        $basket = DB::table('product')->where('id_product', '=', $id)->first();
        return view('basket', compact('basket'));
    }
    public function profile()
    {
        return view('profile');
    }
    public function admin()
    {
        $categories = DB::table('category')->get();
        $articles = DB::table('articles')->get();
        return view('admin', compact('categories', 'articles'));
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
    public function addArticles(Request $request)
    {
        $path = $request->file('image')->store('assets/img', 'public');
        $request->file('image')->move(public_path('assets/img/'), $path);

        DB::table('articles')->insert([
            'articles_name' => $request->nameArticles,
            'articles_description' => $request->descriptionArticles,
            'image' => $path,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('messageAddArticles', 'Статья успешно добавлена');
    }
    public function dellArticles(Request $request)
    {
        DB::table('articles')->where('id_articles','=',value: $request->id_articles)->delete();
        return redirect()->back()->with('messageDellArticles', 'Статья успешно удалена');
    }
}
