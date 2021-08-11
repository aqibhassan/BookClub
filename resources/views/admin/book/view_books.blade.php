@extends('Admin.layouts.master')
@section('title','view-Book')
@section('content')

  
           
                    
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Result Books</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                     
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                             
                                    <div class="table_data">
                                    
                                    @include('Admin.book.books_result')
                              
                                    
                              
                 
                              </div>
                           </div>
                      
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View Books</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        @auth
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('/admin/add-book')}}"> <i class="fa fa-plus"></i> Add Book
                                 </a>  
                              </div>
                              
                           </div>
                           @endauth
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped  table-hover">
                                 <thead>
                                  
                                    <tr class="info">
                                       <th>Image</th>
                                       <th>Book Name</th>
                                       <th>IBAN</th>
                                       <th>Author</th>
                                      
                                      
                                       <th>Favourite</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($books as $book)
                                    <tr>
                                       <td>
                                       @if(!empty($book->image))
                                       <img src="{{asset('/uploads/books/'.$book->image)}}" alt="" style="width:100px;">
                                      @else
                                       <img src="{{asset('/uploads/books/book.png')}}" alt="" style="width:100px;">
                                       </td>
                                       @endif
                                       <td>{{$book->name}}</td>
                                       <td>{{$book->iban}}</td>
                                       <td>{{$book->author_name}}</td>
                                   
                                      
                                        <td class="center">
                                        @if($book->status==1)
                                        <a  href="{{url('/admin/updatebookstatus/'.$book->id)}}" title="Click to Unfavourite" class="btn btn-success btn-sm" >Favourite</a> <br> <br>
                                        @else
                                        <a  href="{{url('/admin/updatebookstatus/'.$book->id)}}" title="Click to Favourite" class="btn btn-danger btn-sm" >Unfavourite</a> <br> <br>
                        
                                        @endif
                                        </td>
                                    
                                       <td>
                                       
                                       <a href="{{URL::to('/admin/add-images',$book->id)}}" class="btn btn-info btn-sm" title="Add Images"><i class="fa fa-image"></i></button>
                                       @auth
                                       <a class="btn btn-add btn-sm" href="{{URL::to('/admin/edit-book', $book->id)}}"  title="Edit -> {{$book->id}}"><i class="fa fa-edit"></i></a>
                           
                                       <a class="btn btn-danger btn-sm" href="{{URL::to('/admin/delete-book', $book->id)}}" title="Delete -> {{$book->id}}"><i class="fa fa-trash-o"></i></a>
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