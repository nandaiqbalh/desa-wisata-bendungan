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
                            <li class="breadcrumb-item active" aria-current="page">Participants </li>
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
                     <h3 class="box-title">Participants </h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Event</th>
                                   <th>Phone</th>
                               </tr>
                           </thead>
                           <tbody>

                            @php
                                ($i = 1)
                            @endphp
                            @forelse($participants as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td class="border px-6 py-4 ">{{ $item->name }}</td>
                                <td class="border px-6 py-4">{{ $item->user->email }}</td>
                                <td class="border px-6 py-4">{{ $item->event->name }}</td>
                                <td class="border px-6 py-4">{{ $item->phone }}</td>

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
