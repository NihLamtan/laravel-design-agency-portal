@extends('layouts.user-dashboard')

@section('title', 'Storage')

<style>
    .fa-paperclip,
    .fa-trash-alt{
      color: gray;
    }
  </style>


    @section('nav-bar')

    <main id="main-sec">
        <x-user-dashboard-navbar/>
    </main>
    
    @endsection 

    
  @section('content')

  
    <section class="section storage-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <div
              class="
                order-sec-content-area
                d-flex
                justify-content-between
                align-items-center
                order-list-main-hd-area
              "
            >
              <h4 class="sec-main-hd order-sec-hd p-0">your Storage</h4>
    
            
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-12">
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th scope="col">Files</th>
                  <th scope="col">Date</th> 
                </tr>
              </thead>
              <tbody>
                @foreach ($storages as $storage)
        
              <tr>
              <td><a href="{{ route('files.show', $storage->id)}}">{{ $storage->file_name }}</a></td>
              <td>{{ $storage->created_at->format('d/m/Y') }}</td>
           

                
              </tr>
              @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </section>


@endsection
    