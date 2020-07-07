@extends('layouts.backend.master')
@section('title','Edit Country')

@section('content')
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div class="card border-left-success">
                    <div class="card-header">
                        <h3 class="card-title">Edit Country</h3>
                    </div>
                    <div class="card-body">
                    
                        <form action="{{route('country.update',$country->id)}}" method='post'>
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="inputName">Country</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('country') is-invalid @enderror" 
                                    name='country'
                                    placeholder='Enter Your Country'
                                    value="{{$country->country}}"
                                />
                                @if($errors->has('country'))
                                    <span class='invalid-feedback'>Country is Required</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="inputName">Embassy</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('embassy') is-invalid @enderror" 
                                    name='embassy'
                                    placeholder='Enter Your Embassy'
                                    value="{{$country->embassy}}"
                                />
                                @if($errors->has('embassy'))
                                    <span class='invalid-feedback'>Embassy is Required</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="inputName">Address</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('address') is-invalid @enderror" 
                                    name='address'
                                    placeholder='Enter Your Address'
                                    value="{{$country->address}}"
                                />
                                @if($errors->has('address'))
                                    <span class='invalid-feedback'>Address is Required</span>
                                @endif
                            </div>

                            <button type='submit' class='btn btn-success'>Update</button>
                            <a href="{{route('country.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection