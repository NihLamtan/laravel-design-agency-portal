<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('super_admin');
    }
    
    public function index()
    {
        $serviceCategory = ServiceCategory::get();

        return view('admin/servicecategory.index', ['serviceCategories' => $serviceCategory]);
    }

    public function create()
    {
        return view('admin/servicecategory.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'image' => 'required',
        ]);
        $slug = Str::slug(request('name'), '-');
        if ($request->hasFile('image')) {
            $image = uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('public/service-categories', $image);
        }
        ServiceCategory::create(array_merge(request()->all(), [
            'slug' => $slug,
            'image' => $image,
        ]));

        return redirect()->route('admin.service_categories.index')->with('success', 'Category has been created');

    }

    public function edit($id)
    {
        $category = ServiceCategory::find($id);

        return view('admin/servicecategory.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'image' => 'required',
        ]);
        $slug = Str::slug(request('name'), '-');
        if ($request->hasFile('image')) {
            $image = uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('public/service-categories', $image);
        }
        $category = ServiceCategory::find($id);

        $category->update([
            'image' => $image,
        ]);

        return redirect()->route('admin.service_categories.index')->with('success', 'Category has been updated');

    }
    
    public function destroy($id)
    {
        $category = ServiceCategory::find($id);

        $category->delete();

        return back()->with('success', 'Category has been deleted');
    }
}
