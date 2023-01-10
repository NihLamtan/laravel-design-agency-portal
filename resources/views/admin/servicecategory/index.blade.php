@extends('admin-layout')
@section('table')
<div class="">
<div class="row mt-5">
  <div class="col-xl-12">
    <div class="m-portlet m-portlet--mobile ">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              Categories
            </h3>
          </div>
        </div>
        <div class="m-portlet__head-tools">
          <ul class="m-portlet__nav">
            <li class="m-portlet__nav-item">
              <a href="{{ route('admin.service_categories.create') }}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
                  <span>
                    <i class="la la-plus"></i>
                    <span>
                      New Category
                    </span>
                  </span>
                </a>
            </li>
            <li class="m-portlet__nav-item">
            </li>
        
          </ul>
        </div>
      </div>
      <div class="m-portlet__body">
        <table class="table m-table ">
          <thead>

            <tr>
              <th>Category Name</th>
                <th>Image</th>
                <th>Action</th>

             
          
            </tr>
        </thead>
        <tbody>
         
          @foreach ($serviceCategories as $category)
            
          <tr>
              <td>{{ $category->name }}</td>
              <td><img src="{{ $category->image_path }}" width="8%" alt=""></td>
            <td>
              <div class="dropdown">
                <a  class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bars"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ route('admin.service_categories.edit', $category->id) }}">edit</a>
                  <a class="dropdown-item" href="#">Update Password</a>
                  <a class="dropdown-item" href="#">Another action</a>
                </div>
              </div>
            </td>
              <td><form class="form" method="POST" action="{{ route('admin.service_categories.destroy', $category->id) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn-delete" type="submit">Delete</button>
            </form></td>
          </tr>

      @endforeach

    </tbody>
  </table>
              
      </div>
    </div>
  </div>
  
</div>
</div>

    </div>
  </div>
 
@endsection
