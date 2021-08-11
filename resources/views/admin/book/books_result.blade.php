<table  class="table table-bordered table-striped  table-hover">
            <thead>
             
               <tr class="info">
              
                  <th>Book Name</th>
                  <th>IBAN</th>
                  <th>Author</th>
                 
               </tr>
            </thead>
            <tbody>
      @if($bookss!=null)
                @foreach($bookss as $book)
                
             <tr>
                   <td>{{$book->name}}</td>
                   <td>{{$book->iban}}</td>
                   <td>{{$book->author_name}}</td>
                </tr>
                @endforeach
              @endif
                   </tbody>
                </table>
                @if($bookss!=null)
               {{ $bookss->links();}}
               @endif