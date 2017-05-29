@extends('template.layouts.form')

@section('content')
      
@include('template.partials.parsley')   
      
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul style=" list-style-type: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Example split danger button -->

         {!! Form::open(array('route' => 'Client.store','method'=>'POST','data-parsley-validate')) !!}

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Personal Details </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>First Name</label>
                  {!! Form::text('firstname', null, array('placeholder' => 'First Name','class' => 'form-control','data-parsley-error-message'=>"First Name is required",'data-parsley-required'=>"true"	)) !!}
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                   <label>Last Name</label>
                  {!! Form::text('lastname', null, array('placeholder' => 'Last Name','class' => 'form-control','data-parsley-error-message'=>"Last Name is required",'data-parsley-required'=>"true")) !!}
              </div>
              
               <div class="form-group">
                   <label>Gender</label>
                   {!! Form::select('gender', $gender,null,array('class' => 'select2 form-control','data-parsley-error-message'=>"Gender is required",'data-parsley-required'=>"true"))  !!}
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                  <label>Middle Name</label>
                  {!! Form::text('middlename', null, array('placeholder' => 'Middle Name','class' => 'form-control','data-parsley-error-message'=>"Middle Name is required",'data-parsley-required'=>"true")) !!}
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                   <label>Date of Birth</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                         {!! Form::text('dateofbirth', null, array('placeholder' => 'From Date','readonly' => 'true','data-parsley-error-message'=>"Date of birth is required",'data-parsley-required'=>"true",'class' => 'form-control datepicker' ,  'data-date-format'=>'dd MM yyyy')) !!}
            
                </div>
              </div>
              
               <div class="form-group">
                <label>Phone Number:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                     {!! Form::text('phonenumber', null, array('placeholder' => 'Phone Number','class' => 'form-control','data-parsley-error-message'=>"Valid Phone Number is required must be a number",'data-parsley-type'=>"number"	,'data-parsley-required'=>"true")) !!}
             
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
  
      </div>
      
      
         <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Client  Information </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
           
              <!-- /.form-group -->
              <div class="form-group">
                   <label>Branch</label>
                   {!! Form::select('branch', $branchlist,null,array('class' => 'select2 form-control','data-parsley-error-message'=>"Branch is required",'data-parsley-required'=>"true"))  !!}
              </div>
              
            
              
              <div class="form-group">
                  <label> Id Number</label>
                     {!! Form::text('idnumber', null, array('placeholder' => 'Id Number','class' => 'form-control','data-parsley-error-message'=>"Valid Id Number is required must be a number",'data-parsley-required'=>"true",'data-parsley-type'=>"number")) !!}
              </div>
              
              

              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                             
              <div class="form-group">
                  <label>loanofficer</label>
                   {!! Form::select('loanofficer', $loanofficer,null,array('class' => 'select2 form-control','data-parsley-error-message'=>"Loan Officer is required",'data-parsley-required'=>"true"))  !!}
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                   <label>Submitted on</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                         {!! Form::text('submittedon', null, array('placeholder' => 'Submitted on', 'readonly' => 'true','class' => 'form-control datepicker' ,  'data-date-format'=>'dd MM yyyy','data-parsley-error-message'=>"Date of birth is required",'data-parsley-required'=>"true")) !!}
            
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
  
      </div>
      
              <div class="box-footer">
              
                  <div class="form-group row">
                    <div class="col-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-space btn-success">Save </button>
                      <span type=button" class="btn btn-space btn-default"><a href="{{ route('Client.index') }}">Cancel</a></span>
                    </div>
                  </div>
        </div>
      <!-- /.box -->
  {!! Form::close() !!}
      <!-- /.row -->

    </section>
    <!-- /.content -->
    
    
    
    @endsection