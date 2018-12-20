@extends('admin.layouts.main')
@section('content')
  <div class="row" style="margin-left: 10%"> 
     <div class="col-sm-9">
      <section class="panel">
        @if (session()->has('DeletedBook'))
        <div class="alert alert-danger">
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <center><strong>{{session()->get('DeletedBook')}}</strong></center>
       </div>
       @endif
      </section>
     </div>
  </div>
<!-- if Section empty from books -->
@if(count($books)==0)
	<div class="row">
	    <div class="col-lg-5 alert alert-info">
	        <center><strong>Section is Empty</strong></center>
	    </div>
	</div>
@else
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading ">
        	  @foreach($sections as $sec)
        		 <div class="active">{{$sec->section_name}}</div>
        		@endforeach
        </header>
        <table class="table table-bordered table-striped table-advance table-hover">
          <tbody>
            <tr>
              <th style="text-align: center;">Title</th>
              <th style="text-align: center;">Edition</th>
              <th style="text-align: center;">Publication</th>
              <th style="text-align: center;">Description</th>
              <th style="text-align: center;">Authors</th>
              <th style="text-align: center;">Cover</th>
              <th style="text-align: center;">Edit</th>
              <th style="text-align: center;">Delete</th>
            </tr>
         <?php $i=0;?>
         @foreach($books as $book)
            <tr>
              <td>{{$book->title}}</td>
              <td>{{$book->edition}}</td>
              <td>{{$book->publication}}</td>
              <td>{{$book->description}}</td>
               <td>
                 <!-- //show Names of Authors -->
                  <?php $Allauthors = $authors[$i];?>
                   @foreach($Allauthors as $author)
                    <?php 
                      $namesOfAuthor = explode('|',$author->fullname);
                      $j=1;
                      foreach ($namesOfAuthor as $name) {
                        echo 'Author : '.$name.'<br><br>';
                        $j++;
                      }
                    ?>
                  @endforeach
                 <?php $i=$i+1;?>
              </td>
              <td>
                <img src="{{asset($book->book_cover)}}" width="100px">
              </td>
        @if($book->trashed())
              <td><!-- To restore Book that deleted -->
              	<a href="/admin/book/restore/{{$book->id}}">
              		<button class="btn btn-default">restore</button>
                </a>
              </td>
              <td><!-- To Delete Book forever -->
              	<a onclick="return confirm('Are you sure To Delete This Book Forever?')" href="admin/book/ForceDelete/{{$book->id}}">
              	<button class="btn btn-danger">Force Delete</button>
              	</a>
              </td>
        @else
              <td><!-- edit book -->
                  <a class="btn btn-primary" href="/admin/book/{{$book->id}}/edit"><i class="fa fa-edit"></i></a>
              </td>
             <td><!-- delete book temprory-->
                <a onclick="return confirm('Are you sure to delete book?')">
                <i>
                  {!! Form::open(['method'=>'DELETE','route'=>['book.destroy',$book->id]])!!}
                  {!! Form::submit('delete',['class'=>'btn btn-danger'])!!}
                  {!! Form::close()!!}
                </a>
             </td>
        @endif
            </tr>
        @endforeach             
          </tbody>
        </table>
      <div class = "row text-center">
          {!! $books->links()!!}
      </div>
      </section>
    </div>
  </div>
@endif
@endsection