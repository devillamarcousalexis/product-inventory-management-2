<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoryController extends Controller
{
    public function viewCategory(Request $request)
    {
        $category = Category::get();
        $tbl_category = Category::get();
        return view('/admin-side/category/view-category', compact('tbl_category'));
    }

    public function addCategory()
    {
        $tbl_category = Category::get();
        return view('/admin-side/category/add-category', compact('tbl_category'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $tbl_category = new Category;
        $tbl_category->category_name = $request->category_name;
        $tbl_category->save();
        return redirect()->back()->with('message', "A Category has been added successfully!");
    }

    public function viewEditCategory($id)
    {
        $tbl_category = Category::find($id);
        return view('/admin-side/category/edit-category', compact('tbl_category'));
    }

    public function submitEditCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string',
        ]);

        $tbl_category = Category::find($request['category_id']);
        $tbl_category->category_name = $request['category_name'];
        $tbl_category->save();
        return redirect()->back()->with('message', "A Category has been updated successfully!");
    }


    public function viewCategoryArchive(Request $request)
    {
        $tbl_category = Category::withTrashed()
            ->where("tbl_category.deleted_at", '!=', NULL)
            ->get();
        return view('/admin-side/category/archived-category', compact('tbl_category'));
    }

    public function Restore($id)
    {
        $tbl_category = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('message', 'A deleted Category has been restored successfully.');
    }

    public function SoftDelete($id)
    {
        $tbl_category = Category::find($id)->delete();
        return Redirect()->back()->with('message', 'A Category has been deleted successfully.');
    }
}
