<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book_Author;
use App\Section;
use App\Author;
use App\Book;
use Validator;
use Auth;
use DB;

class BookController extends Controller
{

    public function index()
    {
        
    }

    public function create()
    {
        $sections =Section::pluck('section_name','id');
        return view('admin.books.create',compact('sections'));
    }

    public function store(Request $request)
    {
        //validate Book_cover,Book_PDF and Description
        Validator::make($request->all(), [
         'book_cover'=>'required|image|mimes:png,jpg,jpeg,bmp,gif|max:1024',
         'book_pdf'=>'required|mimes:pdf|max:51200',
         ])->validate();
        //using transaction to access two preocess,insert books data and insert authors data
        \DB::beginTransaction();
        $bookCover = $request->file('book_cover');
        $bookPDF = $request->file('book_pdf');
        if (isset($bookCover) && isset($bookPDF)) {
            $bookCover= uploadFile($bookCover);
            $bookPDF= uploadFile($bookPDF);
        }else{
            $bookCover = 'uploads/download.jpg';
            $bookPDF= 'uploads/download.pdf';
        }
        $NewBook = New Book;
        $NewBook->section_id = $request->input('section_id');
        $NewBook->title = $request->input('title');
        $NewBook->edition =  $request->input('edition');
        $NewBook->publication = $request->input('publication');
        $NewBook->description = $request->input('description');
        $NewBook->book_cover = $bookCover;
        $NewBook->book_pdf = $bookPDF;
        $NewBook->save();
        //insert authors data into author table
        $NewAuthor = new Author;
        $NewAuthor->fullname= implode('|',$request->input('fullname'));
        $NewAuthor->address =  implode('|',$request->input('address'));
        $NewAuthor->DOP =  implode('|',$request->input('DOP'));
        $NewAuthor->save();
        //INSERT authors_book data
        Book_Author::create(['book_id'=>$NewBook->id,'author_id'=>$NewAuthor->id]);
        \DB::commit();
         $sections =Section::pluck('section_name','id');
         session()->flash('BookAdded','New Book Added successfully.');
         return redirect()->back()->with('sections');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $sections = Section::pluck('section_name','id');
        return view('admin.books.update',compact('book','sections'));
    }

    public function update(Request $request, $id)
    {
        $book = $request->all();
        Validator::make($book, [
         'book_cover'=>'image|mimes:png,jpg,jpeg,bmp,gif|max:1024',
         'book_pdf'=>'mimes:pdf|max:10000',
         ])->validate();
        if (isset($request['book_cover']) AND isset($request['book_pdf']))
        {
            $book['book_pdf'] = uploadFile($book['book_pdf']);
            $book['book_cover'] = uploadFile($book['book_cover']);
            Book::findOrFail($id)->update($book);
        }elseif (isset($request['book_pdf'])) {
            $book['book_pdf'] = uploadFile($book['book_pdf']);
            Book::findOrFail($id)->update($book);
        }elseif (isset($request['book_cover']) ) {
            $book['book_cover'] = uploadFile($book['book_cover']);
            Book::findOrFail($id)->update($book);
        }   
        else{
            Book::findOrFail($id)->update($book);
        }
         session()->flash('UpdateMessage','Book Updated successfully.');
            return redirect()->back();
    }

    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        session()->flash('DeletedBook','Book Deleted Temprory successfully.');
       return redirect()->back();
    }
    //restore book that deleted temprory
    public function restore($id){
        $book = Book::onlyTrashed()->find($id);
        $book->restore();
           return redirect()->back();
    }
    //delte book forever
    public function ForceDelete($id){
        $book = Book::onlyTrashed()->find($id);
        $book->forceDelete();
        session()->flash('DeletedMessage','Book Deleted successfully !!.');
           return redirect()->back();
    }
}
