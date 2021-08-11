<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\AuthorBook;
use Auth;
use Session;
use App\Models\Author;
use Image;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function dashboard()
    {
        $noofbooks=Book::get()->count();
        $noofauthors=Author::get()->count();
        return view('admin.dashboard')->with(compact('noofbooks','noofauthors'));
    }
    public function viewBooks(){
        
        $books =Book::select('authors.name as author_name', 'books.*')->join('author_book', 'books.id', '=', 'author_book.book_id')
        ->join('authors', 'author_book.author_id', '=', 'authors.id')->paginate(5);
       
     
        $bookss=null;
        return view('Admin.book.view_books')->with(compact('books','bookss'));
    }
    public function autocomplete(Request $request)
    {
        if (Auth::check())
        {
                $bookss=Book::select('authors.name as author_name', 'books.*')->join('author_book', 'books.id', '=', 'author_book.book_id')
                ->join('authors', 'author_book.author_id', '=', 'authors.id')
                ->where("books.name","LIKE","%{$request->input('query')}%")->paginate(5);
            }   
            else
            {
                $bookss=Book::select('authors.name as author_name', 'books.*')->join('author_book', 'books.id', '=', 'author_book.book_id')
                ->join('authors', 'author_book.author_id', '=', 'authors.id')
                ->where("books.name","LIKE","%{$request->input('query')}%")->where('user_id',null)->paginate(5); 
            }
            // $html = ' <table  class="table table-bordered table-striped  table-hover">
            // <thead>
             
            //    <tr class="info">
              
            //       <th>Book Name</th>
            //       <th>IBAN</th>
            //       <th>Author</th>
                 
            //    </tr>
            // </thead>
            // <tbody>';
         
            //     foreach($books as $book)
            //     {
            //   $html .= ' <tr>
            //        <td>'.$book->name.'</td>
            //        <td>'.$book->iban.'</td>
            //        <td>'.$book->author_name.'</td>
            //     </tr>';
            //     }
            //     $html .= '   </tbody>
            //     </table>'.$books->links();
          
            //     return response()->json("$html");
        // return response()->json($data);
        return view('Admin.book.books_result', compact('bookss'))->render();
    }
    public function editBook(Request $request,$id)
    {
        // echo "pre";print_r($id);die;
        $book= Book::find($id);
        if($request->isMethod('post')){
            $data = $request->all();
            $filename =$book->image;
            // upload image
            if($request->hasfile('image')){
                echo $img_tmp=$request->image;
                // image path code
                if($img_tmp->isValid()){
                $extension=$img_tmp->getClientOriginalExtension();
                $filename = time() . '.'.$img_tmp->clientExtension();
                // $filename=rand(111,99999).'.'.$extension;
                $img_path='uploads/books/'.$filename;
                // resize image
                $request->image->move('uploads/books/', $filename);
                // $product->image=$filename;
                }
            }
            Book::where(['id'=>$id])->update(['name'=>$data['name'],'iban'=>$data['iban'],'image'=>$filename]);
            return redirect('/admin/view-books')->with('flash_message_success','Book has been updated!!');
     
       
    }
    
    return view('Admin/book/edit_book')->with(compact('book')); 
    }
    public function deleteBook($id){
        Book::destroy($id);
        return redirect()->back()->with('flash_message_error','Book Deleted Successfully');
    }
   
    public function updatebookstatus($id){
        
        $b=Book::where(['id'=>$id])->first();
        if($b->status==1)
        {Book::where('id',$id)->update(['status'=>0]);
         return redirect()->back()->with('flash_message_error','Book Status has been Unfavourite');
        }
        else
        {Book::where('id',$id)->update(['status'=>1]);
         return redirect()->back()->with('flash_message_success','Book Status has been Favourite');
        }
        
    }
    public function addBook(Request $request){
        if($request->ismethod('post'))
        {
            $data=$request->all();
            // echo "pre_";print_r($request->get('author'));die; 
            $book=new  Book;
            $book->name=$data['name'];
            $book->iban=$data['iban'];
            $book->rating=$data['rating'];
            $book->user_id= Auth::user()->id;
         
           
 
            // upload image
            if($request->hasfile('image')){
                echo $img_tmp=$request->image;
                // image path code
                if($img_tmp->isValid()){
                $extension=$img_tmp->getClientOriginalExtension();
                $filename = time() . '.'.$img_tmp->clientExtension();
             
                $request->image->move('uploads/books/', $filename);
                $book->image=$filename;
                }
            }
            $book->save();
            $author=Author::find($request->get('author'));
            $book->authors()->attach( $author);
           
            return redirect('/admin/add-book')->with('flash_message_success','Book has been added Successfully!');


        }

        $authors = Author::all();
        return view('Admin.book.add_book')->with(compact('authors'));
    }
    public function viewAuthors(){
        $authors=Author::get();
        
        return view('Admin.author.view_authors')->with(compact('authors'));
    }
    public function editAuthor(Request $request,$id)
    {
        // echo "pre";print_r($id);die;
        $author= Author::find($id);
        if($request->isMethod('post')){
            $data = $request->all();
         
            Author::where(['id'=>$id])->update(['name'=>$data['name'],'email'=>$data['email']]);
            return redirect('/admin/view-authors')->with('flash_message_success','Author has been updated!!');
     
       
    }
    
    return view('Admin/author/edit_author')->with(compact('author')); 
    }
    public function deleteAuthor($id){
        Author::destroy($id);
        return redirect()->back()->with('flash_message_error','Author Deleted Successfully');
    }
   
    
    public function addAuthor(Request $request){
        if($request->ismethod('post'))
        {
            $data=$request->all();
            // echo "pre";print_r($data);die; 
            $author=new Author;
            $author->name=$data['name'];
            $author->email=$data['email'];
       
            $author->save();
            return redirect('/admin/add-author')->with('flash_message_success','Author has been added Successfully!');


        }

        return view('Admin.author.add_author');
    }


    public function addImages(Request $request,$id){
        $book = Book::where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasfile('image')){
                $files = $request->file('image');
                foreach($files as $file){
                    $image = new BookImage;
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $image_path = 'uploads/books/'.$filename;
                
                   $file->move('uploads/books/', $filename);
                   
                    // Image::make($file)->save();
                    $image->image =  $filename;
                    $image->book_id = $data['book_id'];
                    $image->save();
                }
            }
            return redirect('/admin/add-images/'.$id)->with('flash_message_success','Image has been updated');
        }
        $bookImages = BookImage::where(['book_id'=>$id])->get();
        return view('Admin.book.add_images')->with(compact('book','bookImages'));
    }
    public function deleteAltImage($id=null){
        $bookImage = BookImage::where(['id'=>$id])->first();
        $image_path = 'uploads/books/';
        if(file_exists($image_path.$bookImage->image)){
            unlink($image_path.$bookImage->image);
        }
        BookImage::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_error','Image has been deleted Successfully!');

    }
}
