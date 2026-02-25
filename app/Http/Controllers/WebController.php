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
        $withCategory = function($categories) {
            return $categories->join('category', 'product.id_category', '=', 'category.id_category')->select('product.*', 'category.category_name');
        };
        $array = $withCategory(DB::table("product"))->orderBy('id_product', 'desc')->limit(5)->get();
        $productPopylar = $withCategory(DB::table("product"))->inRandomOrder()->limit(3)->get();
        $productNew = $withCategory(DB::table("product"))->orderBy('id_product', 'desc')->limit(3)->get();
        $productDay = $withCategory(DB::table("product"))->inRandomOrder()->orderBy('price', 'asc')->limit(3)->get();
        $productSpecial = $withCategory(DB::table("product"))->inRandomOrder()->orderBy('price', 'desc')->limit(3)->get();
        $articles = DB::table('articles')->limit(3)->get();
        return view('index', data: compact('array', 'productPopylar', 'productNew', 'productDay', 'productSpecial', 'articles', 'withCategory'));
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
        $catalog = DB::table('product')->join('category', 'product.id_category', '=', 'category.id_category')->select('product.*', 'category.category_name');

        if($request->category && $request->category != 'all'){
            $catalog->where('product.id_category', $request->category);
        }
        if($request->sort == 'producer'){
            $catalog->orderBy('product_producer');
        }
        elseif($request->sort == 'substance'){
            $catalog->orderBy('product_active_substance');
        }
        elseif($request->sort == 'price'){
            $catalog->orderBy('price');
        }

        $array = $catalog->get();
        $categories = DB::table('category')->get();
        return view('catalog', compact('array', 'categories'));
    }
    public function product($id)
    {
        $product = DB::table('product')->where('id_product','=',$id)->join('category', 'product.id_category', '=', 'category.id_category')->select('product.*', 'category.category_name')->first();
        $array = DB::table(table: "product")->where('id_product','!=',$id)->inRandomOrder()->limit(3)->join('category', 'product.id_category', '=', 'category.id_category')->select('product.*', 'category.category_name')->get();
        return view('product', compact('product', 'array'));
    }
    public function basket($id)
    {
        $basket = DB::table('product')->where('id_product', $id)->join('category', 'product.id_category', '=', 'category.id_category')->select('product.*', 'category.category_name')->first();;
        return view('basket', compact('basket'));
    }
    public function order(Request $request)
    {
        $product = DB::table('product')->where('id_product', $request->id_product)->first();
        $total = $product->price * $request->quantity;

        DB::table('order')->insert([
            'id_status' => 1,
            'order_sum' => $total,
            'id_user' => Auth::user()->id_user,
            'created_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ]);

        return view('order', [
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'product' => $product->product_name,
            'quantity' => $request->quantity,
            'total' => $total,
        ]);
    }
    public function profile(Request $request)
    {
        $user_id = Auth::user()->id_user;
        $order = DB::table('order')->where('id_user', $user_id);

        if($request->filter == 'new'){
            $order->orderBy('created_at', 'desc');
        }
        elseif($request->filter == 'old') {
            $order->orderBy('created_at', 'asc');
        }

        $array = $order->get();
        $status = DB::table('status')->get();
        return view('profile', compact('array', 'status'));
    }
    public function admin()
    {
        $categories = DB::table('category')->get();
        $articles = DB::table('articles')->get();
        $status = DB::table('status')->get();
        $order = DB::table('order')->join('users', 'order.id_user', '=', 'users.id_user')->join('status', 'order.id_status', '=', 'status.id_status')->select('order.*', 'users.name', 'users.surname', 'status.status_name')->orderBy('order.created_at', 'desc')->get();
        return view('admin', compact('categories', 'articles', 'status', 'order'));
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
            'id_category' => $request->id_category,
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
    public function updateStatus(Request $request, $id)
    {
        DB::table('order')->where('id_order', $id)->update([
            'id_status' => $request->status
        ]);

        return redirect()->back();
    }
    public function dellOrder(Request $request)
    {
        DB::table('order')->where('id_order','=',value: $request->id_order)->delete();
        return redirect()->back()->with('messageDellOrder', 'Заказ успешно удален');
    }
}
