@extends('layouts.app')

@section('content')

         <div class="row justify-content-center mt-0">
          <div class="col-lg-8">
          <div class="box-header with-border">
           <h3 class="box-title">{{ __('ENTER ISLAND DETAILS') }}</h3>   
         </div>
          <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ route('island.store') }}" >
             @csrf
              <div class="row gx-5">
               
                <div class="form-group col-md-12">
                  <label for="island_name" class="fg-grey">Island Name</label>
                  <input type="text" class="form-control" id="island_name" placeholder="Island" name="island_name" value="{{@old('island_name')}}"> 
                  @if($errors->any())
                      {!! implode('', $errors->all('<div>:message</div>')) !!}
                  @endif
                </div>
              
                <div class="col-12 mt-3">
                  <button type="submit" class="btn btn-primary px-3">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    
@endsection
   