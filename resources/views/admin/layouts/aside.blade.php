    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="{{(Request::segment(1)==='admin' &&Request::segment(2)===null)?'active':''}}">
            <a class="" href="{{adminURL()}}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
<!--           <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Forms</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="form_component.html">Form Elements</a></li>
              <li><a class="" href="form_validation.html">Form Validation</a></li>
            </ul>
          </li> -->

          <li class="{{(Request::segment(2)==='section' &&Request::segment(3)==='create')?'active':''}}">
            <a class="" href="{{adminURL('section/create')}}">
                          <i class="icon_genius"></i>
                          <span>Add New Section</span>
                      </a>
          </li>
          <li class="{{(Request::segment(2)==='book' &&Request::segment(3)==='create')?'active':''}}">
            <a class="" href="{{adminURL('book/create')}}">
                          <i class="fa fa-book"></i>
                          <span>Add New Book</span>

                      </a>

          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
            <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{adminURL()}}">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>