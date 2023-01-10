<x-app-layout>

    <style>
        .container .col-lg-10{
            background: white;
            padding: 30px 50px 50px 50px;
            border-radius: 10px;
            -webkit-box-shadow: 10px 3px 32px -23px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 3px 32px -23px rgba(0,0,0,0.75);
box-shadow: 10px 3px 32px -23px rgba(0,0,0,0.75);
       
        }
        .container .col-lg-10 form input{
            width: 70%;
        }
            
    }
    </style>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h3>Company Information</h3>
        <form method="POST" action={{ route('company-informations.store') }}>
          @csrf
            <div class="form-group pt-4">
              <label for="organization_name">Organization name</label>
              <input type="text" class="form-control @error('organization_name') is-invalid @enderror" id="organization_name" name="organization_name" >
            
              @error('organization_name')
              <div class="invalid-feedback">
                  {{ $errors->first('organization_name') }}
              </div>
              @enderror
            </div>
            <div class="form-group">
                <label for="number_of_employee">Number of employee</label>
                <input type="number" class="form-control @error('number_of_employee') is-invalid @enderror" id="number_of_employee" name="number_of_employee">
              
                @error('number_of_employee')
                <div class="invalid-feedback">
                    {{ $errors->first('number_of_employee') }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="company_logo">Company logo</label>
                <input type="text" class="form-control @error('company_logo') is-invalid @enderror" id="company_logo" name="company_logo">
              
                @error('company_logo')
                <div class="invalid-feedback">
                    {{ $errors->first('company_logo') }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="your_role">Your role</label>
                <input type="text" class="form-control @error('your_role') is-invalid @enderror" id="your_role" name="your_role">
              
                @error('your_role')
                <div class="invalid-feedback">
                    {{ $errors->first('your_role') }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="website">Website</label>
                <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website">
              
                @error('website')
                <div class="invalid-feedback">
                    {{ $errors->first('website') }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="facebook_page">Facebook Page</label>
                <input type="url" class="form-control @error('facebook_page') is-invalid @enderror" id="facebook_page" name="facebook_page">
              
                @error('facebook_page')
                <div class="invalid-feedback">
                    {{ $errors->first('facebook_page') }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="url" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram">
              
                @error('instagram')
                <div class="invalid-feedback">
                    {{ $errors->first('instagram') }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="twitter">Twitter </label>
                <input type="url" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" name="twitter">
              
                @error('twitter')
                <div class="invalid-feedback">
                    {{ $errors->first('twitter') }}
                </div>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    </div>

    </div>
</x-app-layout> 