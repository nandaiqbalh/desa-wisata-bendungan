@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Profile</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-12 col-lg-5 col-xl-4">

              <div class="box box-inverse bg-img" style="background-image: url({{asset('backend/images/gallery/full/1.jpg')}} data-overlay="2">

                  <div class="box-body text-center pb-50">
                        <img class="avatar avatar-xxl avatar-bordered" src="{{(!empty($adminData->profile_photo_path)) ?
                            url('storage/'. $adminData->profile_photo_path):
                            url('upload/no_image.png')}}" alt="">
                    <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">{{$adminData -> name}}</a></h4>
                    <span> {{$adminData -> email}}</span>
                  </div>


                </div>

          </div>
          <div class="col-12 col-lg-7 col-xl-8">

            <div class="box p-15">
                <form action="{{route('admin.profile.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal form-element col-12">
                  @csrf
                    <div class="form-group row">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="inputName" value="{{$adminData -> name}}" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="inputEmail" value="{{$adminData -> email}}" placeholder="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPhoto" class="col-sm-2 control-label">Photo</label>
                    <div class="col-sm-10">
                        <input type="file" name="profile_photo_path" class="form-control" >
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="ml-auto col-sm-10">
                      <button type="submit" class="btn btn-success">Update</button>
                    </div>
                  </div>
                </form>
            </div>
          <!-- /.nav-tabs-custom -->
        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
@endsection

