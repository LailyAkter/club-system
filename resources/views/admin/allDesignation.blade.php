@extends('layouts.backend.master')
@section('title','Designation')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="designation">
                <h1>
                <a href="{{route('designation.create')}}" class='btn btn-primary'>Add Designation</a>
                </h1>
                    <ul class="list-group">
                        @foreach($designations as $designation)
                            <li class="list-group-item">
                                <a href="{{url('api/person',$designation->id)}}">{{$designation->designation}}</a>
                            </li>
                        @endforeach
                    </ul>
            </div>
        </div>
    </div>
@endsection