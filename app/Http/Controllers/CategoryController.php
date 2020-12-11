<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $email = Auth::user()->email;
        $categories = Category::where('user_email', $email)->get();
        return view('category.index', compact('categories'));
    }

    public function create(CategoryRequest $req) {
        $category = new Category();
        $email = Auth::user()->email;

        $category->name = $req->input('name');
        $category->user_email = $email;

        $category->save();

        return redirect()->route('category-index');
    }

    public function destroy($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category-index');
    }

    public function edit(Category $category) {
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $req, Category $category) {
        $category->update(['name' => $req->name]);
        return redirect()->route('category-index');
    }


}



