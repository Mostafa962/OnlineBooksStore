@extends('admin.layouts.main')
@section('content')
        <div class="row">
          <div class="col-lg-6">
            @if(session()->has('resetSuccess'))
             <div class="alert alert-success">
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>{{session('resetSuccess')}}</strong>
             </div>
             @elseif(session()->has('SectionCreated'))
              <div class="alert alert-success">
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>{{session('SectionCreated')}}</strong>
             </div>
             @elseif(session()->has('SectionDeleted'))
              <div class="alert alert-danger">
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>{{session('SectionDeleted')}}</strong>
             </div>         
             @elseif(session()->has('SectionDeletedever'))
              <div class="alert alert-danger">
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>{{session('SectionDeletedever')}}</strong>
             </div>
             @endif
          </div>
        </div>
        <div class="row">
            @foreach($sections as $section)
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box blue-bg">
                   <center><a href="admin/section/{{$section->id}}"><img width="200px" height="200px" src="{{$section->section_cover}}"/></a></center><br>
                  <div class="title text-center">{{$section->section_name}}</div>
                </div>
                @if($section->trashed())
                    <center><a class="btn btn-info btn-md btn-block disabled" href="">Show Books</a></center><br>
                @else 
                       <center><a class="btn btn-info btn-md btn-block" href="admin/section/{{$section->id}}">Show Books</a></center><br>
                @endif
                      <center>
                      <table>
                        <tr>
                        @if($section->trashed())
                        <!-- To restore section that deleted -->
                        <td>
                          <a href="admin/section/restore/{{$section->id}}"><button class="btn btn-default">Restore</button></a>
                        </td>
                        <!-- To Delete Section Forever -->
                        <td>
                          <a href="admin/section/ForceDelete/{{$section->id}}" onclick="return confirm('Are you sure To Delete This Section Forever?')"><button class="btn btn-danger">Force Delete</button>
                          </a>
                        </td>
                      @else 
                        <td> <a class="btn btn-primary" href="admin/section/{{$section->id}}/edit"><i>Edit</i></a></td> 
                        <td>
                          <a onclick="return confirm('Are you sure To Delete This Section ?')">
                            {!!Form::open(['method'=>'DELETE','route'=>['section.destroy',$section->id]])!!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                            {!! Form::close()!!}
                          </a>
                        </td>
                      @endif
                      </tr>
                      </table>
                      </center>
               </div>
            @endforeach
        </div>
      <div class = "row text-center">
            {!!$sections->links()!!};
      </div>
        <!--/.row-->
    <!--main content end-->
@endsection