<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use DB;

class ProductController extends Controller
{
    public function viewProduct(Request $request)
    {
        $product = Product::get();
        $tbl_product = Product::with('category')
            ->get();
        $tbl_category = Category::get();
        return view('/admin-side/product/view-product', compact('tbl_product', 'product', 'tbl_category'));
    }

    public function addProduct()
    {
        $tbl_product = Product::get();
        $tbl_category = Category::get();
        return view('/admin-side/product/add-product', compact('tbl_product', 'tbl_category'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
        ]);

        $tbl_product = new Product;
        $tbl_product->category_id = $request->category_id;
        $tbl_product->product_name = $request->product_name;
        $tbl_product->save();
        return redirect()->back()->with('message', "A Product has been added successfully!");
    }

    public function viewEditProduct($id)
    {
        $tbl_product = Product::find($id);
        $tbl_category = Category::get();
        return view('/admin-side/product/edit-product', compact('tbl_product', 'tbl_category'));
    }

    public function submitEditProduct(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required|string',
        ]);

        $tbl_product = Product::find($request['product_id']);
        $tbl_product->category_id = $request['category_id'];
        $tbl_product->product_name = $request['product_name'];
        $tbl_product->save();
        return redirect()->back()->with('message', "A Product has been updated successfully!");
    }


    public function viewProductArchive(Request $request)
    {
        $tbl_product = Product::withTrashed()
            ->with('category')
            ->where("tbl_product.deleted_at", '!=', NULL)
            ->get();
        return view('/admin-side/product/archived-product', compact('tbl_product'));
    }

    public function Restore($id)
    {
        $tbl_product = Product::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('message', 'A deleted Product has been restored successfully.');
    }

    public function SoftDelete($id)
    {
        $tbl_product = Product::find($id)->delete();
        return Redirect()->back()->with('message', 'A Product has been deleted successfully.');
    }
}
