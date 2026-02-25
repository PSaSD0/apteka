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
    public function catalog(Request $request)
    {
        $query = DB::table('product');
        if($request->category && $request->category != 'all'){
            $query->where('id_category', $request->category);
        }
        if($request->sort == 'producer'){
            $query->orderBy('product_producer');
        }
        elseif($request->sort == 'substance'){
            $query->orderBy('product_active_substance');
        }
        elseif($request->sort == 'price'){
            $query->orderBy('price');
        }

        $array = $query->get();
        $categories = DB::table('category')->get();
        return view('catalog', compact('array', 'categories'));
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
    public function editProductView($id)
    {
        $categories = DB::table('category')->get();
        $product = DB::table('product')->where('id_product', '=', $id)->first();
        return view('editProductView', compact('product', 'categories'));
    }
    public function editProduct($id, Request $request)
    {
        DB::table('product')->where('id_product','=',$id)->update([
            'product_name' => $request->nameProduct,
            'product_description' => $request->descriptionProduct,
            // 'id_category' => $request->id_category,
            'product_producer' => $request->productProducer,
            'product_active_substance' => $request->productActiveSubstance,
            'product_expiration_date' => $request->productExpirationDate,
            'price' => $request->costProduct,
        ]);

        if(isset($request->image)){
            $img = $request->file('image');
            $typeImg = $img->extension();

            $uniqName = Str::random();
            $nameImg = $uniqName.'.'.$typeImg;
            $pathFolder = 'assets/img/';

            $img->move(public_path($pathFolder), $nameImg);

            DB::table('product')->where('id_product', '=', $id)->update([
                'image'=>$pathFolder . $nameImg
            ]);
        }
        return redirect()->back()->with('messageEditProduct', 'Товар успешно обновлен');
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
    public function dellProduct(Request $request)
    {
        DB::table('product')->where('id_product','=',$request->id_product)->delete();
        return redirect()->back();
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
