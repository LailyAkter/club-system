@extends('layouts.backend.master')
@section('title','Password Change')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card  border-left-success">
            <div class="card-header">
                <h5 class="card-title">Password Change</h5>
            </div>
            <div class="card-body">
                <form action="{{url('change/password')}}" method="post">
                    @csrf
                    <input type="hidden" name='active' value='2'>
                    <div class="form-group">
                        <label class="control-label">Old Password</label>
                        <input
                            type="password"
                            class="form-control @error('old_password') is-invalid @enderror"
                            name='old_password'
                            placeholder="Old Password"
                        />
                        @If($errors->has('old_password'))
                            <div class='invalid-feedback'>Old Password is Required</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">New Password</label>
                        <input
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name='password'
                            placeholder="Enter New Password"
                        />
                        @If($errors->has('password'))
                            <div class='invalid-feedback'> New Password is Required</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirm Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name='password_confirmation'
                            placeholder="Enter Password Again"
                        />
                    </div>
                    <button type='submit' class='btn btn-success'>Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
