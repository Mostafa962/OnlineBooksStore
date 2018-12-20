@extends('admin.layouts.main')
@section('content')
  <div class="row" style="margin-left: 10%"> 
       <div class="col-sm-9">
        <section class="panel">
          @if (session()->has('BookAdded'))
          <div class="alert alert-success">
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
           <center><strong>{{session()->get('BookAdded')}}</strong></center>
         </div>
         @endif
        </section>
       </div>
  </div>
    <div class="row">
      <div class="col-lg-12">
        <section class="panel" style="margin-right:  20%">
          <header class="panel-heading"> 
           Add New Book 
          </header>
            <div class="panel-body">
             <!-- show validation errors messages -->
              <div class="col-lg-12">
                      @if(count($errors) > 0)
                  <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                    </ul>
                  </div>
                  @endif
              </div>
              <div class="form">
              {!! Form::open(['method'=>'PUT','route' => 'book.store','files' => true,'class' => 'form-validate form-horizontal','id'=>'feedback_form']) !!}
                  {!! Form::hidden('_method')!!}
                <div class="form-group">
                    <div class="col-sm-9">
                        {!! Form::select('section_id',$sections,old('section_id'),['class' => 'form-control','required'=>'required'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                       {!! Form::text('title',old('title'),['class' => 'form-control','placeholder'=>'Title :','required'=>'required','minlength'=>5,'maxlength'=>50])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        {!! Form::number('edition',old('edition'),['class' => 'form-control','placeholder'=>'Edition','required'=>'required'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                       {!! Form::number('publication',old('publication'),['class' => 'form-control','placeholder'=>'Publication:','required'=>'required'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                      {!! Form::textarea('description', old('description'),array('class'=>'form-control', 
                    'rows' =>6, 'cols' => 50,'placeholder'=>'Description:','required'=>'required','minlength'=>50,'maxlength'=>300)) !!}
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-9">
                      {!!Form::label('pdf', 'Book Cover :')!!}
                      {!! Form::file('book_cover',array('class'=>'form-control','required'=>'required')) !!}
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-9">
                        {!!Form::label('pdf', 'Book PDF :')!!}
                      {!! Form::file('book_pdf',array('class'=>'form-control','required'=>'required')) !!}
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-9">
                       {!! Form::number('auth_num',old('auth_num'),['class' => 'form-control','id'=>'auth_num','placeholder'=>'Number Of Authors:','required'=>'required'])!!}
                    </div>
                      <button id="authors" class="btn btn-primary" type="button">Click To add Authors</button>
                </div>
                <div id="auth"></div>
               <div class="form-group">
                  <div class="col-lg-offset-16 col-lg-10">
                      {!! Form::submit('Add',['class' => 'btn btn-primary'])!!}
                  </div>
              </div>                     
                  {!!FORM::close()!!}
                </div>
            </div>
        </section>
      </div>
      <div class="col-lg-6" id="Newauthor">
      </div>
    </div>
@endsection
<!-- To Add Authors  -->
<script type="text/javascript">
    window.onload = function () {
    var button = document.getElementById("authors");
    button.addEventListener("click", function () {
        var numberAuthors = document.getElementById("auth_num");  
        var D = document.getElementById('auth'); 
        for (var i = 1; i <= parseInt(numberAuthors.value); i++) {
         var div1 = document.createElement('div');
            div1.setAttribute('class','form-group');
            D.appendChild(div1);
          var div2 = document.createElement('div');
            div2.setAttribute('class','col-sm-9');
            div1.appendChild(div2);
          var label = document.createElement('label');
            label.innerHTML = 'Author ' + i; 
            div2.appendChild(label);          
          var Name = document.createElement('input'); 
              Name.setAttribute('type','text');
              Name.setAttribute('name','fullname[]');
              Name.setAttribute('placeholder','Full Name:');
              Name.setAttribute('class','form-control');
              Name.setAttribute('required','required');
              div2.appendChild(Name);
          var Address = document.createElement('input');
            Address.setAttribute('type','text');
            Address.setAttribute('name','address[]');
            Address.setAttribute('placeholder','Address:');
            Address.setAttribute('class','form-control');
            Address.setAttribute('required','required');
            div2.appendChild(Address); 
         var DOP = document.createElement('input'); 
            DOP.setAttribute('type','date');
            DOP.setAttribute('name','DOP[]');
            DOP.setAttribute('class','form-control');
            DOP.setAttribute('required','required');
            div2.appendChild(DOP);
       }
    });
  };
</script>