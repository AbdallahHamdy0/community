@extends('nav')
@section('content')
    
        
    <div class="container bg-light  col-md-4 border  p-3 rounded">
        @if ($stop_register==1)
        {{-- <div class="row gx-4 gx-lg-5 justify-content-center m-3"> --}}
        <div class="container p-3 alert alert-danger text-center my-4 col-12">
            <h3 class="">Oops!... Register is  Closed Now. </h3>
            <h4 class=""> Please Try Again later . . . . </h4>
       </div>
        {{-- </div> --}}
       @else
        <div class="container-title  rounded  m-3" 
            style="text-align: center;height:50px; font-size: 30px;font-weight: bold;"> 
            Register Form
        </div>

       
            
       
        <form class="p-1"  action="/register" method="POST">
            {{ csrf_field() }}
            <div class="form-group m-2">
                <label for="exampleInputEmail1">Name</label>
                <input name="name" type="text" class="form-control"  placeholder="Enter Name">
            </div>

            <div class="form-group  m-2 ">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group m-2">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <div class="form-group form-check m-2">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me!</label>
            </div>

            <div class="form-group" style="text-align: center;">
                <button type="submit" class="btn btn-secondary px-5 m-2">Sign Up</button>
                <a href="/login" class="text-secondary" > Already have Account?</a>
            </div>
        </form>
        @endif
@endsection
