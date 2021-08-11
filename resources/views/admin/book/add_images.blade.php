@extends('Admin.layouts.master')
@section('title','Book Images')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-book"></i>
       </div>
       <div class="header-title">
          <h1>Add/View Books Images</h1>
     <br>
       </div>
    </section>
    @if(Session::has('flash_message_error'))
   <div class="alert alert-sm alert-danger alert-block" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      <strong>{!! session('flash_message_error') !!}</strong>
   </div>
   @endif
   
   @if(Session::has('flash_message_success'))
   <div class="alert alert-sm alert-success alert-block" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      <strong>{!! session('flash_message_success') !!}</strong>
   </div>
   @endif
    <!-- Main content -->
    <section class="content">
       <div class="row">
          <!-- Form controls -->
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonlist"> 
                      <a class="btn btn-add " href="{{url('admin/view-books')}}"> 
                      <i class="fa fa-eye"></i>  View Books </a>  
                   </div>
                </div>
                <div class="panel-body">
                <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/add-images/'.$book->id)}}" method="post"> {{csrf_field()}}
                <input type="hidden" name="book_id" value="{{$book->id}}">
                      <div class="form-group">
                         <label>Book Name</label> {{$book->name}}
                      </div>
                      
                      <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="image[]" id="image" accept="image/*"  multiple="multiple">
                     </div>


                      <div class="reset-button">
                         <input type="submit" class="btn btn-success" value="Add Image">
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>

    <section class="content">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="btn-group" id="buttonexport">
                     <a href="#">
                        <h4>View Images</h4>
                     </a>
                  </div>
               </div>
               <div class="panel-body">
               <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                  <div class="btn-group">
                 
                     
                  </div>
                  <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                  <div class="table-responsive">
                     <table id="table_id" class="table table-bordered table-striped table-hover">
                      <thead>
                           <tr class="info">
                              <th>ID</th>
                              <th>Book ID</th>
                              <th>Image</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($bookImages as $bookImage)
                           <tr>

                           <td>{{$bookImage->id}}</td>

                           <td>{{$bookImage->book_id}}</td>
                           <td>
                          
                           <img src="{{asset('/uploads/books/'.$bookImage->image)}}" alt="" style="width:80px;">
                           </td>
                              <td class="center">
                                 <div class="btn-group">
                                       <a href="{{url('/admin/delete-alt-image/'.$bookImage->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>
                                 </div>
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
      </div>
   </section>
 </div>
 <!-- /.content-wrapper -->

@endsection