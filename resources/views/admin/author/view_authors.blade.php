@extends('Admin.layouts.master')
@section('title','View Authors')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-eye"></i>
       </div>
       <div class="header-title">
          <h1>View Authors</h1>
         <br>
       </div>
    </section>
    @if(Session::has('flash_message_error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
    <strong>{{ session('flash_message_error') }}</strong>
    </div>
    @endif
    @if(Session::has('flash_message_success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
    <strong>{{ session('flash_message_success') }}</strong>
    </div>
    @endif

    <div id="message_success" style="display:none;" class="alert alert-sm alert-success">Status Enabled</div>
    <div id="message_error" style="display:none;" class="alert alert-sm alert-danger">Status Disabled</div>
    <!-- Main content -->
    <section class="content">
       <div class="row">
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonexport">
                      <a href="#">
                         <h4>View Auhtors</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                @auth
                   <div class="btn-group">
                      <div class="buttonexport" id="buttonlist"> 
                      <a class="btn btn-add" href="{{url('admin/add-author')}}"> <i class="fa fa-plus"></i> Add Author 
                         </a>  
                      </div>
                      @endauth
                   </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="table_id" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                               
                               <th> Name</th>
                               <th> Email</th>
                               
                               <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                             @foreach($authors as $author)
                            <tr>
                          
                            <td>{{$author->name}}</td>
                            <td>{{$author->email}}</td>
                           
                            
                          
                             
                            </td>
                               <td>
                               @auth
                               <a href="{{url('/admin/edit-author/'.$author->id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></button>
                               <a href="{{url('/admin/delete-author/'.$author->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </button>
                              @else
                              <br>
                               @endauth
                              </td>
                            </tr>
                             @endforeach
                         </tbody>
                      </table>
                      
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
@endsection