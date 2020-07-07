@extends('layouts.backend.master')
@section('title','person')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="person">
                <h2 class='text-success text-center'>Person Details</h2>
                @foreach($designations as $person)
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                        </tr>
                        <tr>
                            <td>{{$person->name}}</td>
                            <td>{{$person->email}}</td>
                            <td>{{$person->phone_number}}</td>
                        </tr>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
@endsection