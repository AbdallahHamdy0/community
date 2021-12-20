@extends('Layout')
@section('content')
    <div class="mt-5">
        <table class="table m-3 ">
            <thead>
              <tr>
                <th scope="col">All User</th>
                <td>{{$users}}</td>
                
              </tr>
              <tr>
                <th scope="col">All Posts</th>
                <td>{{$posts}}</td>
                
              </tr>
              <tr>
                <th scope="col">All Comments</th>
                <td>{{$comments}}</td>
                
              </tr>
              <tr>
                <th scope="col">Most Active user </th>
                <td>{{$comments}}</td>
                
              </tr>
              <tr>
                <th scope="col">Most Commen Post</th>
                <td>{{$comments}}</td>
                
              </tr>
            </thead>
          </table>    
    
    </div>
@endsection