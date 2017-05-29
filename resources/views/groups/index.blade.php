
@extends('template.layouts.table')

@section('content')
      
                @if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	      @endif
              
              @if ($message = Session::get('error'))
		<div class="alert alert-danger">
			<p>{{ $message }}</p>
		</div>
	      @endif
              

<section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $title }}</h3>
              
                <div class="panel-heading">
                       <div class="tools"><a class="btn btn-success " href="{{ route('Group.create') }}"> New</a>
                         <a class="btn btn-default" href="{{ url('dashboard') }}"> Cancel</a>
                       </div>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Client</th>
                  <th>Status</th>
                  <th>Office</th>
                
                </tr>
                </thead>
                <tbody>
                    
               @foreach ($groups  as $obj )
                <tr>
                    <td><a href='{{ route('Group.show',$obj->id)}}'> {{ $obj->name }}</a></td>
                  <td>{{ $obj->accountNo }}</td>
                  <td>{{ $obj->status->value }}</td>
                  <td>{{ $obj->officeName }}</td>
                 
                </tr>
               @endforeach
               
               
                
                </tbody>
                <tfoot>
                <tr>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    
    
    
        
    @endsection