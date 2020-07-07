@extends('layouts.backend.master')
@section('title','Edit Designation')

@section('content')
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div class="card border-left-success">
                    <div class="card-header">
                        <h3 class="card-title">Edit Designation</h3>
                    </div>
                    <div class="card-body">
            
                        <form action="{{route('designation.update',$designation->id)}}" method='post'>
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="inputName">Country  Name</label>
                                    <select name="country_id" id="" class='form-control'>
                                    <option>---Select Country----</option>
                                    @foreach($countries as $country) 
                                        <option value="{{$country->id}}" {{$designation->country_id == $country->id?"selected":""}}>{{$country->country}}</option>
                                    @endforeach
                                    </select>
                                @if($errors->has('country_id'))
                                    <span class='text-danger'>Country Name is Required</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="inputName">Designation</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('designation') is-invalid @enderror" 
                                    name='designation'
                                    placeholder='Enter Your Designation'
                                    value="{{$designation->designation}}"
                                />
                                @if($errors->has('designation'))
                                    <span class='invalid-feedback'>Designation is Required</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name='name'
                                    placeholder='Enter Your Name'
                                    value="{{$designation->name}}"
                                />
                                @if($errors->has('name'))
                                    <span class='invalid-feedback'>Name is Required</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name='email'
                                    placeholder='Enter Your Email'
                                    value="{{$designation->email}}"
                                />
                                @if($errors->has('email'))
                                    <span class='invalid-feedback'>Email is Required</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="inputName">Phone Number</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('phone_number') is-invalid @enderror" 
                                    name='phone_number'
                                    placeholder='Enter Your Phone Number'
                                    value="{{$designation->phone_number}}"
                                />
                                @if($errors->has('phone_number'))
                                    <span class='invalid-feedback'>Phone Number is Required</span>
                                @endif
                            </div>

                            <button type='submit' class='btn btn-success'>Update</button>
                            <a href="{{route('designation.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection