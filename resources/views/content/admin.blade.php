@extends('Layout')
@section('content')
<h2 class="m-auto  p-3">List of User</h2>

    <div class="container m-auto p-auto ">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">Email</th>
                <th scope="col">Admin</th>
                <th scope="col">Editor</th>
                <th scope="col">User</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <form method="POST" action="/add_role">
                    {{ csrf_field() }}
                    <input type="hidden" name="email" value="{{$user->email}}">
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <input type="checkbox" name="role_admin" onChange="this.form.submit()" {{$user->hasRole('Admin') ? 'checked' : ' '}}>
                        </td>
                        <td><input type="checkbox" name="role_editor" onChange="this.form.submit()" {{$user->hasRole('editor') ? 'checked' : ' '}}></td>
                        <td><input type="checkbox" name="role_user" onChange="this.form.submit()" {{$user->hasRole('user') ? 'checked' : ' '}}></td>
                        
                    </tr>
                    
                </form>
              @endforeach

            </tbody>
          </table>
          
    </div>
    <h2> Setting  </h2>
         
            
          <form method="POST" action="/settings">

            {{ csrf_field() }}
            <div  class=" rounded p-4 m-5  mb-2 bg-success text-light text-center">
          <b> Stop Comment: </b><input type="checkbox"  name="stop_comment"   onChange="this.form.submit()"  {{$stop_comment == 1 ? 'checked' : ' '}}>

        </div>
        <div  class="  rounded p-4 m-5 mt-2 bg-success text-light text-center">
          <b> Stop Register: </b><input type="checkbox"  name="stop_register"   onChange="this.form.submit()"  {{$stop_register == 1 ? 'checked' : ' '}}>

        </div>
          </form>
       
@endsection