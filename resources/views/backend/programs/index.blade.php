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
                            <li class="breadcrumb-item active" aria-current="page">Program </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
			<div class="col-12">

                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Program </h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                    <div class="mb-10">
                        <a href="{{ route('programs.create') }}" class="btn btn-primary">
                            + Create Program
                        </a>
                    </div>
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Name</th>
                                   <th>Thumbnail</th>
                                   <th>Category</th>
                                   <th>Description</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>

                            @php
                                ($i = 1)
                            @endphp
                            @forelse($programs as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td class="border px-6 py-4 ">{{ $item->name }}</td>
                                <td class="border px-6 py-4">
                                    <img src="{{Storage::url($item->thumbnail)}}" alt="Image" width="150px">
                                </td>
                                <td class="border px-6 py-4">{{ $item->category_name }}</td>
                                <td class="border px-6 py-4">{{ $item->short_desc }}</td>
                                <td class="border px-6 py-4">
                                    @if ($item -> status == 1)
                                        <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                    @endif
                                </td>

                                <td class="border px-6 py- text-center">

                                    @if ($item -> status == 1)
                                        <a href="{{ route('program.inactive', $item->id) }}" style="margin-bottom: 4px; width: 75px" class="btn btn-secondary" title="Inactive Now">
                                            <i class="fa fa-arrow-down"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('program.active', $item->id) }}" style="margin-bottom: 4px; width: 75px" class="btn btn-success" title="Inactive Now">
                                            <i class="fa fa-arrow-up"></i>
                                        </a>
                                    @endif

                                    <a href="{{ route('programs.edit', $item->id) }}" style="margin-bottom: 4px; width: 75px" class="btn btn-warning" title="Edit">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <form action="{{ route('programs.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}

                                        <button type="submit" style="margin-bottom: 4px; width: 75px" class="btn btn-danger" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>


                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="6" class="border text-center p-5">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse
                           </tbody>

                         </table>
                       </div>
                   </div>
                   <!-- /.box-body -->
                 </div>
                 <!-- /.box -->
               </div>
        </div>
    </section>
</div>


@endsection
