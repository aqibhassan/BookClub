 <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="active">
                     <a href="{{URL::to('/admin/dashboard')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                
                    
                      <li class="treeview">
                        <a href="#">
                        <i class="fa fa-user"></i><span>Authors</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                        @auth
                           <li><a href="{{url('admin/add-auhtor')}}">Add Authors</a></li>
                        @endauth
                        <li><a href="{{url('admin/view-authors')}}">View Authors</a></li>
                        </ul>
                     </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-book"></i><span>Books</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                     @auth
                        <li><a href="{{url('/admin/add-book')}}">Add Book</a></li>
                        @endauth
                        <li><a href="{{url('/admin/view-books')}}">View Books</a></li>
                     </ul>
                  </li>
                 
               </ul>
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- =============================================== -->