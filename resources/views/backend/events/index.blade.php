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
                            <li class="breadcrumb-item active" aria-current="page">Event </li>
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
                     <h3 class="box-title">Event </h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                    <div class="mb-10">
                        <a href="{{ route('events.create') }}" class="btn btn-primary">
                            + Create Event
                        </a>
                    </div>
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Name</th>
                                   <th>Thumbnail</th>
                                   <th>Description</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>

                            @php
                                ($i = 1)
                            @endphp
                            @forelse($events as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td class="border px-6 py-4 ">{{ $item->name }}</td>
                                <td class="border px-6 py-4">
                                    <img src="{{Storage::url($item->thumbnail)}}" alt="Image" width="150px">
                                </td>
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
                                        <a href="{{ route('event.inactive', $item->id) }}" style="margin-bottom: 4px; width: 75px" class="btn btn-secondary" title="Inactive Now">
                                            <i class="fa fa-arrow-down"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('event.active', $item->id) }}" style="margin-bottom: 4px; width: 75px" class="btn btn-success" title="Inactive Now">
                                            <i class="fa fa-arrow-up"></i>
                                        </a>
                                    @endif

                                    <a href="{{ route('events.edit', $item->id) }}"  style="width: 100px" class="btn btn-success">
                                        Edit
                                    </a>
                                    <form action="{{ route('events.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <br>

                                        <button type="submit" style="width: 100px" class="btn btn-warning">
                                            Delete
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

               <div class="col-12">

                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Deleted Event</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Name</th>
                                   <th>Thumbnail</th>
                                   <th>Description</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>

                            @php
                                ($i = 1)
                            @endphp
                            @forelse($events_deleted as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td class="border px-6 py-4 ">{{ $item->name }}</td>
                                <td class="border px-6 py-4">
                                    <img src="{{Storage::url($item->thumbnail)}}" alt="Image" width="150px">
                                </td>
                                <td class="border px-6 py-4">{{ $item->short_desc }}</td>
                                <td class="border px-6 py-4">
                                    @if ($item -> status == 1)
                                        <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                    @endif
                                </td>

                                <td class="border px-6 py- text-center">

                                    @method('POST')
                                    <form method="POST" action="{{ route('events.restore', $item->id) }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-info">Restore</button>
                                    </form>

                                    <form action="{{ route('events.force-delete', $item->id) }}" method="POST" class="inline-block">
                                        {!! method_field('post') . csrf_field() !!}
                                        <br>

                                        <button type="submit" style="width: 100px" class="btn btn-danger">
                                            Delete Permanent
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
