<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;
use App\Book;
use Validator;
class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::withTrashed()->paginate(4);
        return view('admin.home',compact('sections'));
    }

    public function create()
    {
       return view('admin.sections.add');
    }

    public function store(Request $request)
    {
        //validate Book_cover,Book_PDF and Description
        Validator::make($request->all(), [
         'section_cover'=>'required|image|mimes:png,jpg,jpeg,bmp,gif|max:1024',
         ])->validate();
        $section = $request->all();
        if (isset($section['section_cover'])) {
            // uploadFile is helper function in App\Http\helper.php used to uploade files
            $section['section_cover'] = uploadFile($section['section_cover']);
        }else{
            $section['section_cover'] = 'uploads/download.jpg';
        }
        Section::create($section);
        session()->flash('SectionCreated','Section created successfully.');
        return redirect(adminURL());
    }

    public function show($id)
    {
        $section = Section::findOrFail($id);
        $books = $section->books()->withTrashed()->paginate(4);
        //show Authors of books
        $authors = [];
        $i=0;
        foreach ($books as $book) {
            $authors = array_add($authors,$i,$book->authors);
            $i++;
        }
        $sections = Section::Where('id',$id);
         return view('admin.sections.show',compact('books','sections','authors'));
    }
    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('admin.Sections.update',compact('section'));
    }

    public function update(Request $request, $id)
    {
        $section = $request->all();
        if (isset($section['section_cover'])) {
            $section['section_cover'] = uploadFile($section['section_cover']);
            Section::findOrFail($id)->update($section);
        }else{
            Section::findOrFail($id)->update($section);
        }
        session()->flash('SectionUpdated','Section Updated successfully.');
            return redirect()->back();
    }

    //softdelete section and his related books
    public function destroy($id)
    {
        Section::findOrFail($id)->delete();
        $SectionBooks = Book::Where('section_id',$id)->get();
        foreach ($SectionBooks as $book) {
            $book->delete();
        }
        session()->flash('SectionDeleted','Section Deleted Temperory !!.');
        return redirect()->back();
    }
     //To restore Section and his releated books From Temperory Deletion
    public function restore($id){
        $section = Section::onlyTrashed()->find($id);
        $section->restore();
        $SectionBooks = Book::onlyTrashed()->Where('section_id',$id)->get();
        foreach ($SectionBooks as $book) {
            $book->restore();
        }
           return redirect()->back();
    }
    //To Delete section forever
    public function ForceDelete($id){
        $section = Section::onlyTrashed()->find($id);
        $section->forceDelete();
        session()->flash('SectionDeletedever','Section Deleted successfully !!.');
        return redirect()->back();
    }
}
