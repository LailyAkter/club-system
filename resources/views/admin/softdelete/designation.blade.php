@extends('layouts.backend.master')
@section('title','Soft  Delete Designation')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Soft Delete</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Designation</th>
                            <th>Country Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>SL</th>
                            <th>Designation</th>
                            <th>Country Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($designations as $key=>$designation)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$designation->designation}}</td>
                                <td>{{$designation->country->country}}</td>
                                @if($designation->trashed())
                                    <td style='float:left'>
                                        <form action="{{url('designation/restore/'.$designation->id)}}" method='POST'>
                                            @csrf
                                            <button type='submit' class="btn btn-success btn-sm">
                                                <span style='margin-left:5px'>Restore</span>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@endsection