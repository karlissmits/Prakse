@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<h1>Lietvardi</h1>


<td><a href = '/lietvardi/pievienot' class="btn btn-primary">Pievienot lietvardu</a></td>
<input type="text" class="form-controller" id="search" placeholder="meklet" name="search"></input>
<h3>Neapstiprinatie vardi</h3>
<table class="table table-striped">
  <thead>
                        <tr>
                            <th>ID</th>
                           <th>Lietvards</th>
                            <th>Pievienots</th>
                            <th>Pievienoja</th>

                        </tr>
                      </thead>
                      <tbody class="seit">
                        @foreach($vardi as $vards)
                            <tr>
                                <td>{{$vards->id}}</td>
                                <td>{{$vards->lietvards}}</td>
                                <td>{{$vards->created_at}}</td>
                                <td>{{$vards->user}}</td>

                                <td><a href = '/jaunie/apstiprinat/{{ $vards->id }}' class="btn btn-secondary">Apstiprinat</a></td>
                                <td><a href = '/jaunie/delete/{{ $vards->id }}' onclick="return myFunction() "class="btn btn-danger">Dzest</a></td>
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
