@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<h1>Darbibas vardi</h1>


<td><a href = '/darbibasv/pievienot' class="btn btn-primary">Pievienot darbibas vardu</a></td>
<input type="text" class="form-controller" id="search" placeholder="meklet" name="search"></input>
<h3>Neapstiprinatie vardi</h3>
<table class="table table-striped">
  <thead>
                        <tr>
                            <th>ID</th>
                           <th>Darbibas vards</th>
                            <th>Pievienots</th>
                            <th>Pievienoja</th>

                        </tr>
                      </thead>
                      <tbody class="seit">
                        @foreach($darbibasv as $dv)
                         @if($dv->apstiprinats_id==0)
                            <tr>
                                <td>{{$dv->id}}</td>
                                <td>{{$dv->darbibasv}}</td>
                                <td>{{$dv->created_at}}</td>
                                <td>{{$dv->user}}</td>

                                <td><a href = '/jauniedv/apstiprinat/{{ $dv->id }}' class="btn btn-secondary">Apstiprinat</a></td>
                                <td><a href = '/darbibasv/delete/{{ $dv->id }}' onclick="return myFunction() "class="btn btn-danger">Dzest</a></td>
                            </tr>
                            @endif
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
