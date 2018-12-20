@extends('admin.layouts.main')
@section('content')
    <div class="row" style="margin-left: 10%"> 
         <div class="col-sm-9">
          <section class="panel">
            @if (session()->has('UpdateMessage'))
            <div class="alert alert-success">
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
             <center><strong>{{session()->get('UpdateMessage')}}</strong></center>
           </div>
           @endif
          </section>
         </div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <section class="panel" style="margin-right:  20%">
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
          <header class="panel-heading"> 
           Edit {{$book->title}}
          </header>
            <div class="panel-body">
              <div class="form">
                 {!! Form::model($book,['method'=>'PATCH','route' =>['book.update',$book->id],'files' => true,'class' => 'form-validate form-horizontal','id'=>'feedback_form']) !!}
                <div class="form-group">
                        {!!Form::label('Section', 'Section :', ['class' => 'control-label col-lg-2'])!!}
                    <div class="col-sm-9">
                        {!! Form::select('section_id',$sections,old('section_id'),['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="form-group">
                        {!!Form::label('BookEdition', 'Edition :', ['class' => 'control-label col-lg-2'])!!}
                    <div class="col-sm-9">
                        {!! Form::number('edition',old('edition'),['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="form-group">
                        {!!Form::label('title', 'Title :', ['class' => 'control-label col-lg-2'])!!}
                    <div class="col-sm-9">
                       {!! Form::text('title',old('title'),['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="form-group">
                        {!!Form::label('publication', 'Publication :', ['class' => 'control-label col-lg-2'])!!}
                    <div class="col-sm-9">
                       {!! Form::number('publication',old('publication'),['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="form-group">
                       {!!Form::label('descrip', 'Desciption :', ['class' => 'control-label col-lg-2'])!!}
                    <div class="col-sm-9">
                      {!! Form::textarea('description', old('description'),array('class'=>'form-control', 
                    'rows' =>6, 'cols' => 50))!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                        {!!Form::label('image', 'Book Cover :', ['class' => 'control-label col-lg-2'])!!}
                      {!! Form::file('book_cover',array('class'=>'form-control')) !!}
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-9">
                        {!!Form::label('pdf', 'Book PDF :', ['class' => 'control-label col-lg-2'])!!}
                      {!! Form::file('book_pdf',array('class'=>'form-control')) !!}
                    </div>
                </div 
                <div class="form-group">
                     <div class="col-lg-offset-2 col-lg-10">
                      {!! Form::submit('Update',['class' => 'btn btn-primary'])!!}
                    </div>
                </div>                     
                {!!FORM::close()!!}
              </div>
            </div>
        </section>
      </div>
      <div class="col-lg-4">
            <img src='{{asset($book->book_cover)}}' width="50%" alt='picture'>
      </div>
    </div>
@endsection