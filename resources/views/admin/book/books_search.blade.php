@if(Route::is('admin.view-books') )

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-book"></i>
               </div>
               <div class="header-title">
                  <h1>View Books</h1>
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
              <div id="message_success" style="display:none;" class="alert alert-sm alert-success">Status Enabled</div>
              <div id="message_error" style="display:none;" class="alert alert-sm alert-danger">Status Disabled</div>

            <!-- Main content -->
            <section class="content">
               <div class="row">
<div class="form-group" style="width:50%;">
                       
                       <input type="text" class="form-control" placeholder="Search for books" name="book-search" id="book-search" >
              
                    </div>
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

                    
                    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('#book-search').typeahead({
            source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
        
                    $('.table_data').html(data);
                    // return process(data);
                });
            }
        });
   </script>
   
       
@endif