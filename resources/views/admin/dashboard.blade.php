@extends('layouts.backend.master')
@section('title','Dashboard')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Home</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- University Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style='font-size:25px'>
                                Country
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countries->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-globe"  style='font-size:50px' aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Peroson Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style='font-size:25px'>
                                Person
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$designations->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users"  style='font-size:50px' aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 style='float:left'>
                <!-- <a href="{{route('country.create')}}" class='btn btn-success'>Add Country</a> -->
            </h2>
        </div>
        <div class="col-md-4">
            <form class="form-inline my-2 my-lg-0" method='get' action='/search'>
                <input class="form-control mr-sm-2" name='search' type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="all_data">
                <div class="form-group">
                    <label for="inputName">Country Name</label>
                    <select name="country_id" id='country_id' class='form-control'>
                        <option>---Select Country----</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}"  {{old("country_id") == $country->id ? "selected": ""}}>{{$country->country}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputName">Embassy</label>
                    <a href="{{url('api/designation')}}">
                        <input 
                            type="text" 
                            class='form-control' 
                            id="embassy" 
                            placeholder='Enter Your Embassy'
                        />  
                    </a>
                </div>

                <div class="form-group">
                    <label for="inputName">Embassy Address</label>
                    <a>
                        <input 
                            type="text" 
                            class='form-control' 
                            id="address" 
                            placeholder='Enter Your Embassy'
                        />  
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('js')
<script>
    var productId = document.getElementById("country_id");
 // eii taa drop down a hobe id taa
    productId.addEventListener('change',(event)=>{
        var value = event.target.value;
        //ajax
        //get the value
        let  host= window.location.origin
        $.ajax({
            type:"get",
            url:host+'/api/getembassy?country_id='+value,
            success:function(returnData){
                console.log(returnData);
                var embassy = document.getElementById("embassy");
                embassy.value=returnData.embassy;
                embassy.parentNode.href=host+"/api/designation/"+value;
                var address = document.getElementById('address');
                address.value=returnData.address;
            }
        })
    })
</script>
@endsection