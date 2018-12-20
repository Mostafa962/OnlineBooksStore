@extends('admin.layouts.main')
@section('content')
	    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Add New Section
              </header>
              <div class="panel-body">
                <div class="form">
                {!! Form::open(['method'=>'PUT','route'=>'section.store','files' => true,'class' => 'form-validate form-horizontal','id'=>'feedback_form']) !!}
                  {!! Form::hidden('_method')!!}
                    <div class="form-group ">
                      <div class="col-lg-10">
                      	{!!Form::label('Section', 'Section Name :')!!}
                      	{!! Form::text('section_name',old('section_name'),['class' => 'form-control','required'=>'required','minlength'=>5,'maxlength'=>15])!!}
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="col-lg-10">
                  	  {!!Form::label('pdf', 'Section Cover :')!!}
                      {!! Form::file('section_cover',array('class'=>'form-control','required'=>'required')) !!}
                    </div>
                    </div>
                    {!! Form::submit('Add',['class' => 'btn btn-primary'])!!}
                    {!!FORM::close()!!}
                </div>
              </div>
            </section>
          </div>
        </div>
@endsection