@extends('layouts.backend.master')
@section('title','Profile Update')

@section('content')
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div class="card  border-left-success">
                    <div class="card-header">
                        <h3 class="card-title">Profile Update</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/profile/update')}}" method='post'  enctype='multipart/form-data'>
                        @csrf
                            <div class="form-group">
                                <label> Name</label>
                                <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name='name'
                                    placeholder='Enter Your Name'
                                    value="{{Auth::user()->name}}"
                                />
                                @if($errors->has('name'))
                                    <span class='invalid-feedback'> Name is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input 
                                    type="email" 
                                    id="inputName" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name='email'
                                    placeholder='Enter Your Email'
                                    value="{{Auth::user()->email}}"
                                />
                                @if($errors->has('email'))
                                    <span class='invalid-feedback'>Email is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Upload Profile Image</label>
                                <input 
                                    type="file" 
                                    class="form-control @error('avatar') is-invalid @enderror" 
                                    name='avatar'
                                />
                                @if($errors->has('avatar'))
                                    <span class='invalid-feedback'>Avatar is Required</span>
                                @endif
                            </div>
                            <button type='submit' class='btn btn-success'>Update Profile</button>
                            <a href="{{url('dashboard')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection