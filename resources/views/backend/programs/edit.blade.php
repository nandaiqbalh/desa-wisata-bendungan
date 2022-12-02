@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Admin</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('programs.index')}}">Program</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><b>Edit Program</b></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Edit Program</h4>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">

                   <form action="{{route('programs.update', $item->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('put')
                     <div class="row">
                       <div class="col-6">
                        <div class="col md-6">
                            <div class="form-group">
                                <h5>Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input value="{{ old('name') ?? $item->name }}" id="name" type="text" name="name" class="form-control" required >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Category Select<span class="text-danger">*</span></label>
                                <div class="controls">
                                    <select name="program_cat_id" class="form-control" >
                                        <option value="" selected="" disabled="">Select Program Category</option>
                                        @foreach($program_categories as $program_category)
                                            <option value="{{$program_category -> id}}" {{$program_category -> id == $item -> program_cat_id ? 'selected' : ''}}>{{$program_category -> name}}</option>
                                        @endforeach
                                    </select>
                                 </div>
                            </div>

                            <div class="form-group">
                                <h5>Short Description<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input value="{{ old('short_desc') ?? $item->short_desc }}" id="short_desc" type="text" name="short_desc" class="form-control" required >
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Long Description</h5>
                                <div class="controls">
                                    <textarea id="long_desc" type="text" name="long_desc" rows="5" class="form-control">{{ old('long_desc') ?? $item->long_desc }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Program Thumbnail<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="thumbnail" class="form-control" >
                                </div>
                              </div>

                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-success mb-5" value="Update">Update</button>
                            </div>
                        </div>
                        </div>
                        </div>
                   </form>
               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </section>

</div>
@endsection
