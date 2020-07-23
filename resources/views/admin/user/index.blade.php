@extends('layouts.backend.master')
@section('title','User')

@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <a href="{{route('user.create')}}" class="btn btn-primary">
            <i class="fas fa-plus">
                <span style='margin-left:5px'>Add User</span>
            </i>
        </a>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>SL</th>
                            <th></th>
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
                                <td style='float:left'>
                                <a class="btn btn-info btn-sm" href="{{route('designation.edit',$designation->id)}}">
                                    <i class="fas fa-pencil-alt"></i>
                                    <span style='margin-left:5px'>EDIT</span>
                                </a>
                            </td>
                            <td style='float:left'>
                                <form action="{{route('designation.destroy',$designation->id)}}" method='POST'>
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        <span style='margin-left:5px'>DELETE</span>
                                    </button>
                                </form>
                            </td>
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

@section('js')
<!-- Page level plugins -->
<script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Page level custom scripts -->

<script>
    // Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable({
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        columnDefs: [{
        targets: [0],
        orderData: [0, 1]
        }, {
        targets: [1],
        orderData: [1, 0]
        }, {
        targets: [4],
        orderData: [4, 0]
        }]
    });
});
</script>

@endsection