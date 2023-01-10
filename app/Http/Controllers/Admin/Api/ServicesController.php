<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Package;


class ServicesController extends Controller
{
    public function index($category_id)
    {
      $get_category =  Service::where('category_id', $category_id)->select('name', 'price', 'id')->get()->toArray();

        return response()->json(['data' => $get_category]);
    }
    public function service_package($service_id)
    {
      $get_services =  Package::where('service_id', $service_id)->select('title', 'amount', 'id')->get()->toArray();

        return response()->json(['data' => $get_services]);
    }
}
