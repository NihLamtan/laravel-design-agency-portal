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
              Storage
            </h3>
          </div>
        </div>
        <div class="m-portlet__head-tools">
          <ul class="m-portlet__nav">
            <li class="m-portlet__nav-item">
              <a href="{{ route('admin.storage.create') }}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
                  <span>
                    <i class="la la-plus"></i>
                    <span>
                      Create Storage
                    </span>
                  </span>
                </a>
            </li>
            <li class="m-portlet__nav-item">
            </li>
            <li class="m-portlet__nav-item">
              <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                  <i class="la la-ellipsis-h m--font-brand"></i>
                </a>
                <div class="m-dropdown__wrapper">
                  <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                  <div class="m-dropdown__inner">
                    <div class="m-dropdown__body">
                      <div class="m-dropdown__content">
                        <ul class="m-nav">
                          <li class="m-nav__section m-nav__section--first">
                            <span class="m-nav__section-text">
                              Quick Actions
                            </span>
                          </li>
                          <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                              <i class="m-nav__link-icon flaticon-share"></i>
                              <span class="m-nav__link-text">
                                Create Post
                              </span>
                            </a>
                          </li>
                          <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                              <i class="m-nav__link-icon flaticon-chat-1"></i>
                              <span class="m-nav__link-text">
                                Send Messages
                              </span>
                            </a>
                          </li>
                          <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                              <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                              <span class="m-nav__link-text">
                                Upload File
                              </span>
                            </a>
                          </li>
                          <li class="m-nav__section">
                            <span class="m-nav__section-text">
                              Useful Links
                            </span>
                          </li>
                          <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                              <i class="m-nav__link-icon flaticon-info"></i>
                              <span class="m-nav__link-text">
                                FAQ
                              </span>
                            </a>
                          </li>
                          <li class="m-nav__item">
                            <a href="" class="m-nav__link">
                              <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                              <span class="m-nav__link-text">
                                Support
                              </span>
                            </a>
                          </li>
                          <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                          <li class="m-nav__item m--hide">
                            <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                              Submit
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="m-portlet__body">
        <table class="table m-table ">
          <thead>

            <tr>
              <th>Customer</th>
              <th>File</th>
              <th>Create_at</th>
              <th>Updated_At</th>

             
          
            </tr>
        </thead>
        <tbody>
         
          @foreach ($storages as $storage)
            
          <tr>
          <td>{{ $storage->user->first_name }} {{ $storage->user->last_name }}</td>
          <td>{{ $storage->file_name }}</td>
          <td>{{ $storage->created_at }}</td>
          <td>{{ $storage->updated_at }}</td>
          <td><div class="dropdown">
            <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bars"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ route('admin.storage.edit', $storage->id) }}">Edit</a>
              <a  class="dropdown-item" href="{{ route('admin.storage.show', $storage->id)}}">Download</a>
            </div>
          </div></td>
  

          <td><form class="form" method="POST" action="{{ route('admin.storage.destroy', $storage->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button  class="btn btn-delete p-0" type="submit"><i class="fas fa-trash-alt"></i></button>
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




{{-- @extends('admin-layout')

@section('heading')
<h1 class="heading">Storage</h1>
    
@endsection

@section('table')
<div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>File</th>
                    <th>Create_at</th>
                    <th>Updated_At</th>
                   
                  

                </tr>
              </thead>
<tbody>
                @foreach ($storages as $storage)
            
                <tr>
                <td>{{ $storage->user->first_name }} {{ $storage->user->last_name }}</td>
                <td>{{ $storage->file_name }}</td>
                <td>{{ $storage->created_at }}</td>
                <td>{{ $storage->updated_at }}</td>

                </tr>
            
                @endforeach
              </tbody>
         
      </div>
    </div>
  </div>



@endsection --}}