@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-new-task">
                <div class="card-header"></div>
                <div class="card-body">
                <div class="content-wrapper">
                <!-- Content Header (Page header) -->
              

                    <!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ __('EDIT EMPLOYEES DETAILS') }}</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                            <form action="{{ route('employee.update',$employee['id']) }}" method="post" enctype="multipart/form-data">
                            @csrf


                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">                              
                                       
                                          <div class="box-body">
                                          <h4 class="box-title text-info"> SECTION A</h4>
                                                <hr class="my-15">
                                                <div class="row">
                                               
                                                   <div class="form-group col-md-6">
                                                      <label for="name"><span class="text-danger">*</span> FULL NAME</label>
                                                   
                                                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{$employee['name']}}" id="name" placeholder="Enter a Full name" name="name" autocomplete="off">
                                                           @if(session()->has('error'))
                                                            <div class="alert alert-danger">
                                                               {{ session()->get('error') }}
                                                            </div>
                                                         @endif
                                                   
                                                   </div>
                                                   <div class="form-group col-md-6">
                                                      <label for="age"><span class="text-danger">*</span> Age</label>
                                                     
                                                            <input type="age" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}" value="{{$employee['age']}}" id="age" placeholder="Enter age" name="age" autocomplete="off">
                                                            @if ($errors->has('receive_date'))
                                                               <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $errors->first('age') }}</strong>
                                                            </span>
                                                            @endif
                                                   
                                                   </div>
                                                   
                                                </div>
                                                <!-- new input -->
                                                <h4 class="box-title text-info"> SECTION B</h4>
                                                <hr class="my-15">
                                                <div class="row">
                                               
                                                   <div class="form-group col-md-6">
                                                      <label for="island"><span class="text-danger">*</span> Island Name</label>
                                                   
                                                            <input type="text" class="form-control {{ $errors->has('island') ? ' is-invalid' : '' }}" value="{{$employee['island']}}" id="island" placeholder="Enter a Emergency Contact" name="island" autocomplete="off">
                                                           @if(session()->has('error'))
                                                            <div class="alert alert-danger">
                                                               {{ session()->get('error') }}
                                                            </div>
                                                         @endif
                                                   
                                                   </div>
                                                   
                                                   
                                                </div>
                                               
                                          <!-- /.box-body -->
                                          <div class="box-footer text-right">
                                                <button type="submit" class="btn btn-primary btn-outline">
                                                   <i class="ti-save-alt"></i> Update
                                                </button>
                                                <a class="btn btn-warning btn-outline mr-1" href="">
                                                   <i class="ti-trash"></i> Cancel
                                                </a>
                                          </div>
                                          <!-- /.box-footer -->
                                       </form>
                                       </div>
                                                   <!-- /.box-body -->
                                                </div>
                                                <!-- /.box -->
                                          </section>
                                          <!-- /.content -->

                                       </div>
                                    </div>
                              </div>
                           </div>

                        </div>

                       
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        
@endsection
   