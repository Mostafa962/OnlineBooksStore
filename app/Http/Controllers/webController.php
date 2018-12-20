<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Section;
use App\Book;
use App\Author;
use App\User;
use App\Contact;
use Session;
use Validator;
use DB;
use Auth;
use Illuminate\Support\Facades\Response;
class webController extends Controller
{
    public function home(){
    	return view('web.home');
    }
    //Method For Show All Books 
    public function showBooks(){
    	$books = Book::all();
    	$authors = [];
        $i=0;
        foreach ($books as $book) {
            $authors = array_add($authors,$i,$book->authors);
            $i++;
        }

    	return view('web.books.showbooks',compact('books','authors'));
    }
    //Method To Show New Releases
    public function newbooks(){
    	$books = Book::all();
    	return view('web.books.showbooks',compact('books'));
    }
    //Method To Show Books That Related To a particular Section 
   public function SectionBooks($id){
  	 	$sections = Section::all();
        $books =  Book::Where('section_id',$id)->get();
        $authors = [];
        $i=0;
        foreach ($books as $book) {
            $authors = array_add($authors,$i,$book->authors);
            $i++;
        }
        return view('web.books.showbooks',compact('books','sections','authors'));
    }
    //Methods For account Settings
    public function settings($id){
    	$userData = User::where('id', $id)->first();
    	return view('web.auth.AccountSettings',compact('userData'));
    }
    public function UpdateAccount($id,Request $request){
    	$this->validate($request,[
			'name' => ['required', 'string', 'max:255'],
            'username' => ['required','max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['confirmed'],
			],[],[
			'password'				 =>'Password',
			'password_confirmation'	 =>'Two Passwords'
		]);
		if ($request['password']!==null) {
			$user = User::where('id',$id)->update([
			'name'=>$request->name,
			'username'=>$request->username,
			'email'=>$request->email,
			'password'=>bcrypt($request->password)]);
        }else{
        	$user = User::where('id',$id)->update([
			'name'=>$request->name,
			'username'=>$request->username,
			'email'=>$request->email,]);
        }
		session()->flash('AccountUpdates',trans('user.the_account_Updated_succcess'));
    	return redirect(homeURL());
    }
    //Contact US
    public function contactUs(Request $request){
        $contactInfo = $request->all();
         Validator::make($request->all(), [
         'email' => 'required|string|email|max:255',
         ])->validate();
         Contact::create($contactInfo);
         Session::flash('ContactMessage',trans('user.contact_success'));
         //note i don't redirect to home just  becouse if user not login session flash will expire
         if(userWeb()->check()){
            return redirect(homeURL());
         }
         return redirect('home/login');
    }
    //Method Download Books
    public function DownloadBook($bookId) {
        $bookPDF = Book::Where('id',$bookId)->get(['book_pdf']);
        foreach ($bookPDF as $v) {
            $bookName =substr($v->book_pdf,8);
        }							
        $file_path = public_path() .'\uploads\\'. $bookName;
        if (file_exists($file_path)) {
            return Response::download($file_path, $bookName, [
                'Content-Length: '. filesize($file_path)
            ]);
        }else {
            // Error
            dd('Requested file does not exist on our server!');
        }
    }
}
