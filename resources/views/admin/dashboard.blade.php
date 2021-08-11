@extends('admin.layouts.master')
@section('title','Dashboard')
@section('content')
      
           <!-- Content Wrapper. Contains page content -->
           <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-tachometer"></i>
               </div>
               <div class="header-title">
                  <h1> Dashboard</h1>
                  <small>Very detailed & featured.</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                  <a href="{{url('/admin/view-books')}}">
                     <div id="cardbox1">
                        <div class="statistic-box">
                           <i class="fa fa-book fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">{{$noofbooks}}</span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Total Books</h3>
                        </div>
                     </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                  <a href="{{url('/admin/view-authors')}}">
                     <div id="cardbox2">
                        <div class="statistic-box">
                        
                           <i class="fa fa-user  fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">{{$noofauthors}}</span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3>  Total Authors</h3>
                        </div>
                     </div>
                     </a>
                  </div>
       
               
                
			        
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         

@endsection 

