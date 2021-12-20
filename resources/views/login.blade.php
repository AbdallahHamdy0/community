@extends('nav')
@section('content')
    
        
    <div class="container bg-light  col-md-4 border  p-3 rounded">
        <div class="container-title  rounded  m-3" 
            style="text-align: center;height:50px; font-size: 30px;font-weight: bold;"> 
            Sign In
        </div>

        <form class="p-1"  action="/login" method="POST">
            {{ csrf_field() }}
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
                <button type="submit" class="btn btn-secondary px-5 m-2">Log in</button>
                <a href="/register" class="text-secondary" > Don't have Account?</a>
            </div>
            
            @foreach ($errors->all() as $error)
            
    <div class="alert alert-danger" role="alert">
        
            {{$error}}            
    </div>
    @endforeach 
        </form>
@endsection
