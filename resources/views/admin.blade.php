@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<h1>This is Admin Panel</h1>







<td><a href = '/add' class="btn btn-primary">Add User</a></td>
<input type="text" class="form-controller" id="search" name="search"></input>
<table class="table table-striped">
  <thead>
                        <tr>
                            <th>Users</th>
                           <th>Name</th>
                            <th>E-mail</th>
                            <th>Password</th>
                            <th>Role</th>

                        </tr>
                      </thead>
                      <tbody class="seit">
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->password}}</td>
                                <td>{{$user->role_id}}</td>

                                <td><a href = 'edit/{{ $user->id }}' class="btn btn-secondary">Edit</a></td>
                                <td><a href = 'delete/{{ $user->id }}' onclick="return myFunction() "class="btn btn-danger">Delete</a></td>
                            </tr>
                       @endforeach
</tbody>


                    </table>

                    <script type="text/javascript">

                    $('#search').on('keyup',function(){
                    $value=$(this).val();
                    $.ajax({
                    type : 'get',
                    url : '{{URL::to('search')}}',
                    data:{'search':$value},

                    success:function(data){
                    $('tbody.seit').html(data);
                    }
                    });
                  })
                </script>

                <script>
                  function myFunction() {
                  var r = confirm("Are You Sure?");
                      if (r == false) {
                          return false;
                        }

                      }
                    </script>

                <script type="text/javascript">
                    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
                </script>

@endsection
