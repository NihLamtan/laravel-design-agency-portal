
@section('title', 'Brief')

<style>
  input[type=file]{
    width: 0;
      height: 0;
      z-index: -1;
      position: absolute;
    overflow: hidden;
    opacity: 0;
}
</style>


      <div class="row justify-content-center text-center">
        <div class="col-8">
          <h2 class="section-heading">How would you like your Brand?</h2>
        </div>
      </div>
      <div class="brief-field">
        <div class="row">
          <div class="col-12">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label"
                >What is your brand name?</label
              >
              <input type="text" id="company-information-name" class="form-control" name="instructions[Your Brand]" value="{{ $brief->instructions['Your brand'] ?? '' }}" />

            </div>
          </div>
          <div class="col-12">

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label"
                >If you have a slogan or tagline you would like to use in your
                brand, please include it here.</label
              >
              <input type="text" id="company-information-tagline" class="form-control" name="instructions[Your Brand Tagline]" value="{{ $brief->instructions['Your Brand Tagline'] ?? '' }}">
            </div>
          </div>

          <div class="col-12">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label"
                >What products / services do you provide?</label
              >
              <textarea id="company-information-products" rows="4" cols="80" class="form-control" name="instructions[Your Product Service]"  placeholder="e.g. We provide custom floral arrangements for weddings. We are unique in the industry because we can create flower colours to perfectly match the specific colour scheme of any wedding.">{{ $brief->instructions['Your Product Service'] ?? '' }}</textarea>

            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-6">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"
              >Please select your target audience?</label
            >
            <x-select class="form-control  mb-2"     :options="['10 to 30' => '10 to 30', '30 to 50' => '30 to 50', '50 year above' => '50 year above']" :selected="$brief->instructions['Your Target Audience?'] ?? ''" name="instructions[Your Target Audience?]"/>


          </div>
        </div>
        <div class="col-6">
          <div class="mb-3 mt-5">
           

              <x-select class="form-control  mb-2"     :options="['Male' => 'Male', 'Female' => 'Female', 'Both of them' => 'Both of them']" :selected="$brief->instructions['Your Target Audience?'] ?? ''" name="instructions[Your Gender]"/>  
  
          </div>
        </div>
       
        </div>
         
        <div class="row">
          <div class="col">
            <div class="mb-2 pt-4">
              <label for="exampleFormControlInput1" class="form-label"
                >What industry do you belong to?</label
              >
            </div>
          </div>
        </div>
        <div class="row p-3">
          {{-- <div class="col"> --}}
            <x-radio-group :options="['Fashion' => 'Fashion', 'Education' => 'Education', 'Gaming' => 'Gaming', 'Technology' => 'Technology', 'Lifestyle' => 'Lifestyle', 'Music' => 'Music', 'Art' => 'Art', 'Entertainment' => 'Entertainment', 'Beauty' => 'Beauty']" :selected="$brief->instructions['Your Industry'] ?? '' " class="logo-type" name="instructions[Your Industry]" />
          {{-- </div> --}}
    </div>
        <div class="row ">
          <div class="col">
            <div class="mb-2 pt-3">
              <label for="exampleFormControlInput1" class="form-label"
                >Choose more additional keywords that you associate with your
                brand:</label
              >
            </div>
          </div>
        </div>
        <div class="row p-3">
          <x-checkbox-group :options="['Expert' => 'Expert', 'Clean' => 'Clean', 'Nimble' => 'Nimble', 'Sporty' => 'Sporty', 'Crafty' => 'Crafty',  'Creative' => 'Creative', 'Tough' => 'Tough', 'Dainty' => 'Dainty', 'Romantic' => 'Romantic', 'Graceful' => 'Graceful', 'Vivacious' => 'Vivacious', 'Whimsical' => 'Whimsical', 'Sentimental' => 'Sentimental', 'Everyday' => 'Everyday', 'Sleek' => 'Sleek', 'Imagine' => 'Imagine', 'Joyful' => 'Joyful', 'Innovative' => 'Innovative', 'Welcoming' => 'Welcoming', 'Peaceful' => 'Peaceful', 'Fancy' => 'Fancy', 'Edgy' => 'Edgy', 'Wild' => 'Wild']" :selected="$brief->instructions['Additional Keywords'] ?? '' " class="add-keywords logo-type" name="instructions[Additional Keywords][]"  />
        </div>

    </div>
   

  @push('script')
  <script>
      var error = "{{ $errors->first('inspiration_logo_file') }}"
      if(error) {
          notie.alert({
              type: 'error',
              text: error,
              stay: true,
              time: 3,
              position: 'top'
          })
      }


  
  </script>
@endpush

