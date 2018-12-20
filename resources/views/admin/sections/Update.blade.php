@extends('admin.layouts.main')
@section('content')
        <div class="row">
        @if(session()->has('SectionUpdated'))
          <div class="alert alert-success">
             <strong>{{session('SectionUpdated')}}</strong>
         </div>
         @endif
        </div>
        <div class="row">
            <div class="col-lg-6">
                <section class="panel" style="margin-right:  20%">
                  <header class="panel-heading"> 
                   Edit {{$section->section_name}}
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
                         {!! Form::model($section,['method'=>'PATCH','route' =>['section.update',$section->id],$section->id,'files' => true,'class' => 'form-validate form-horizontal','id'=>'feedback_form']) !!}
                        <div class="form-group">
                                {!!Form::label('sec_name', 'Section Name:', ['class' => 'control-label col-lg-2'])!!}
                            <div class="col-sm-9">
                                {!! Form::text('section_name',old('section_name'),['class' => 'form-control','minlength'=>5,'maxlength'=>15])!!}
                            </div>
                        </div>
                        <div class="form-group">
                               {!!Form::label('image', 'Image :', ['class' => 'control-label col-lg-2'])!!}
                            <div class="col-sm-9">
                              {!! Form::file('section_cover', old('section_cover'),['class' => 'form-control'])!!}
                            </div>
                        </div>     
                        <div class="form-group">
                             <div class="col-lg-offset-2 col-lg-10">
                              {!! Form::submit('Updadte',['class' => 'btn btn-primary'])!!}
                            </div>
                        </div>                     
                        {!!FORM::close()!!}
                      </div>
                    </div>
                </section>
            </div>
      <div class="col-lg-6">
        <img src='{{asset($section->section_cover)}}' width="50%" alt=' picture'>
      </div>
    </div>
@endsection