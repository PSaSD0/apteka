<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = DB::table('product')->join('category', 'product.id_category', '=', 'category.id_category')->select('product.*', 'category.category_name')->where('product.product_name', 'like', '%' . $search . '%')->orWhere('product.product_producer', 'like', '%' . $search . '%')->orWhere('product.product_active_substance', 'like', '%' . $search . '%')->orWhere('product.product_description', 'like', '%' . $search . '%')->orWhere('category.category_name', 'like', '%' . $search . '%')->get();

        return view('searchResults', [
            'results' => $results,
            'search' => $search
        ]);
    }
}
