@extends('layouts.backend.master')
@section('title','History')

@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All History</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Model</th>
                            <th>Action</th>
                            <!-- <th>User</th> -->
                            <th>Old Values</th>       
                            <th>New Values</th>
                            <th>Url</th>
                            <th>Ip_adrress</th>       
                            <th>Navegador</th>   
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Model</th>
                            <th>Action</th>
                            <!-- <th>User</th> -->
                            <th>Old Values</th>       
                            <th>New Values</th>
                            <th>Url</th>
                            <th>Ip_adrress</th>       
                            <th>Navegador</th>   
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($audits as $audit)
                            <tr>
                                <td>{{ $audit->auditable_type }} (id: {{ $audit->auditable_id }})</td>
                                <td>{{ $audit->event }}</td>
                                

                                <td>
                                    <table class="table table-bordered" id="dataTable" width="100%" >
                                            @foreach($audit->old_values as $attribute  => $value)                                 
                                                <tr>
                                                    <td><b>{{ $attribute  }}</b></td>
                                                    <td>{{ $value }}</td>
                                                </tr>                                  
                                            @endforeach
                                    </table>
                                </td>                    
                                <td>
                                    <table class="table table-bordered" id="dataTable" width="100%" >
                                        @foreach($audit->new_values as  $attribute  => $data)
                                            <tr>
                                                <td><b>{{  $attribute  }}</b></td>
                                                <td>{{ $data }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td width='20%'>{{ $audit->url }}</td>
                                <td width='20%'>{{ $audit->ip_address }}</td>
                                <td width='20%'>{{ $audit->user_agent }}</td>   
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
        targets: [5],
        orderData: [5, 0]
        }]
    });
});
</script>

@endsection

