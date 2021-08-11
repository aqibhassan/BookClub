@extends('Admin.layouts.master')
@section('title','Edit Book')
@section('content')

  <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-book"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Book</h1>
                 <br>
               </div>
            </section>

            @if(Session::has('flash_message_error'))
              <div class="alert alert-sm alert-danger alert-block" role= "alert">
                <button type="buttton" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong>{!! session('flash_message_error') !!}</strong>
              </div>
              @endif
              @if(Session::has('flash_message_success'))
              <div class="alert alert-sm alert-success alert-block" role= "alert">
                <button type="buttton" class="close" data-dismiss="alert" aria-label="Close">
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
                              <a class="btn btn-add " href="{{url('/admin/view-books')}}"> 
                              <i class="fa fa-eye"></i>  View Books </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" enctype="multipart/form-data"action="{{ route ('admin.edit-book',$book->id)}}" method="post" >{{csrf_field()}}
                           <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control" value="{{$book->name}}" placeholder="Enter Book name" name="name" id="name" required>
                              </div>
                              <div class="form-group">
                                 <label>IBAN</label>
                                 <input type="text" class="form-control" value="{{$book->iban}}" placeholder="Enter IBAN" name="iban" id="iban" required>
                              </div>
                              <div class="form-group">
                                 <label>Rating</label>
                                 <input type="rating" class="form-control" value="{{$book->rating}}" placeholder="Enter Rating" name="rating" id="rating" min='1' max='5' required>
                              </div>
                
                              
                           
                              <div class="form-group">
                                 <label>Picture upload</label>
                                 <input type="file" name="image">
                                 <input type="hidden" name="current_image" value="{{$book->image}}">
                                 @if(!empty($book->image))
                                <img style="width:100px;margin-top:10px;" src="{{asset('/uploads/books/'.$book->image)}}"> 
                                @endif 
                              </div>
                              <div class="reset-button">
                                 
                                 <input type="submit" class="btn btn-success" value="Edit Book">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->

@endsection
