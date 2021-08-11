<!DOCTYPE html>
<html lang="en">
   
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title') | BookClub</title>
      <meta name="csrf-token" content="{{csrf_token()}}">
      
      <!-- Favicon and touch icons -->
     <link rel="shortcut icon" href="{{asset('Admin_Assets/dist/img/book.png')}}" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="{{asset('Admin_Assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="{{asset('Admin_Assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="{{asset('Admin_Assets/plugins/lobipanel/lobipanel.min.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="{{asset('Admin_Assets/plugins/pace/flash.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="{{asset('Admin_Assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="{{asset('Admin_Assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="{{asset('Admin_Assets/themify-icons/themify-icons.css')}}" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start page Label Plugins 
         =====================================================================-->
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
               <!-- Emojionearea -->
      <!-- End page Label Plugins 
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="{{asset('Admin_Assets/dist/css/stylecrm.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
  
      </head>
   <body class="hold-transition sidebar-mini">
     <!--preloader-->
     <!--<div id="preloader">-->
     <!--    <div id="status"></div>-->
     <!-- </div>-->

      <!-- Site wrapper -->
      <div class="wrapper">
      @include('Admin.layouts.Header')
      @include('Admin.layouts.Sidebar')
      @include('Admin.book.books_search')

      @yield('content')
      @include('Admin.layouts.Footer')
      </div>
      <!-- /.wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- jquery-ui --> 
      <script src="{{asset('Admin_Assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="{{asset('Admin_Assets/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="{{asset('Admin_Assets/plugins/lobipanel/lobipanel.min.js')}}" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="{{asset('Admin_Assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="{{asset('Admin_Assets/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript">    </script>
      <!-- FastClick -->
      <script src="{{asset('Admin_Assets/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="{{asset('Admin_Assets/dist/js/custom.js')}}" type="text/javascript"></script>
     
       
    
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Page Lavel Plugins
         =====================================================================-->
     <!-- Counter js -->
      <script src="{{asset('Admin_Assets/plugins/counterup/waypoints.js')}}" type="text/javascript"></script>
      <script src="{{asset('Admin_Assets/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
      <!-- Monthly js -->
      <script src="{{asset('Admin_Assets/plugins/monthly/monthly.js')}}" type="text/javascript"></script>
      <!-- End Page Lavel Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      
      <!-- Dashboard js -->
      <script src="{{asset('Admin_Assets/dist/js/dashboard.js')}}" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->
         <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
        <script>
      $(document).ready( function () {
         $('#table_id').DataTable();
            // "pagin":false,
        
      });

    
      </script>
     
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.js"></script>
    
   </body>

<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:08:11 GMT -->
</html>