<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Package;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('super_admin');
    }
    
    public function index()
    {
        $service = Service::with('category')->latest()->get();

        return view('admin/services.index', ['services' => $service]);
    }

    public function create()
    {
        $serviceCategories = ServiceCategory::pluck('name', 'id')->toArray();

        return view('admin/services.create', compact('serviceCategories'));
    }

    public function store(Request $request)
    {
        // request()->validate([
        //     'category_id' => 'required',
        //     'name' => 'required',
        //     'plan' => 'required',
        //     'price' => 'required',
        //     'description' => 'required',
        //     'meta_title' => 'required',
        //     'meta_description' => 'required',
        //     'features' => 'required',
        // ]);
        $category = ServiceCategory::where('id', request('category_id'))->pluck('name')->first();
        $slug = Str::slug($category.' '.request('name'), '-');
        $serviceImage = '';

        if ($request->hasFile('image_upload')) {
            $serviceImage = uniqid().'.'.$request->image_upload->getClientOriginalExtension();
            $request->image_upload->storeAs('public/services-img', $serviceImage);
        }
    
        if ($request->hasFile('front_img')) {
            $front_image = uniqid().'.'.$request->front_img->getClientOriginalExtension();
            $request->front_img->storeAs('public/front-images', $front_image);
        }

        $features = explode(',', $request->features);
        

       


        $service = Service::create([
            'slug' => $slug,
            'name' => $request->name,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'plan' => $request->plan,
            'price' => $request->price,
            'features' => $features,
            'image_upload' => $serviceImage,
            'front_img' => $front_image,
            'popular' => $request->popular ? true : false,
            'category_id' => $request->category_id
            ]);

        
        
        if(is_array($request->title) && count($request->title)) {
            $packages = [];
            foreach($request->title as $key => $title) {
                $packages[] = [
                    'title' => $title,
                    'description' => $request->description[$key],
                    'amount' => $request->amount[$key],
                ];
            }
            $service->packages()->createMany($packages);
        }    
        
            
      





        return redirect()->route('admin.services.index')->with('success', 'Service has been created');
    }

    public function show($id)
    {
        $service = Service::find($id);
        $user = User::pluck('name', 'id')->toArray();

        return view('services.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::find($id);
        $serviceCategories = ServiceCategory::pluck('name', 'id')->toArray();

        return view('admin/services.edit', compact('service', 'serviceCategories'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        $category = ServiceCategory::where('id', request('category_id'))->pluck('name')->first();
        $features = explode(',', $request->features);

        $slug = Str::slug(request('name'), '-');
        $serviceImage = '';
        if ($request->hasFile('image_upload')) {
            $serviceImage = uniqid().'.'.$request->image_upload->getClientOriginalExtension();
            $request->image_upload->storeAs('public/services-img', $serviceImage);
        }
        if ($request->hasFile('front_img')) {
            $front_image = uniqid().'.'.$request->front_img->getClientOriginalExtension();
            $request->front_img->storeAs('public/front-images', $front_image);
        }


       $service->update([
            'slug' => $slug,
            'features' => $features,
            'image_upload' => $serviceImage,
            'front_img' => $front_image,
            'popular' => $request->popular ? true : false,
            'name' => $request->name,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'plan' => $request->plan,
            'price' => $request->price,
            
        ]);

        if($request->packages) {
            foreach($request->packages as $id => $package_data) {
                $package = $service->packages()->find($id);
                $package->update($package_data);
            }
        }    

        


        return redirect()->route('admin.services.index')->with('success', 'Service has been updated');
    }

    public function destroy($id)
    {
        $service = Service::find($id);

        $service->delete();

        return redirect()->route('admin.services.index');
    }
}
