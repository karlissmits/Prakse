@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<h1>Darbibas vardi</h1>

<select name="sortBy" id="sortBy">
    <option value="asc">Ascending</option>
    <option value="desc">Descending</option>
</select>

<td><a href = '/darbibasvardi/pievienot' class="btn btn-primary">Pievienot darbibas vardu</a></td>
<input type="text" class="form-controller" id="search" placeholder="meklet" name="search"></input>
<table class="table table-striped">
  <thead>
                        <tr>
                            <th>ID</th>
                           <th>Darbibas vards</th>
                            <th>Pievienots</th>
                            <th>Pievienoja</th>

                        </tr>
                      </thead>
                      <tbody class="seit3">
                        @foreach($darbibasv as $dv)
                         @if($dv->apstiprinats_id==1)
                            <tr>
                                <td>{{$dv->id}}</td>
                                <td>{{$dv->darbibasv}}</td>
                                <td>{{$dv->created_at}}</td>
                                <td>{{$dv->user}}</td>

                                <td><a href = '/darbibasvardi/rediget/{{ $dv->id }}' class="btn btn-secondary">Rediget</a></td>
                                <td><a href = '/darbibasvardi/delete/{{ $dv->id }}' onclick="return myFunction() "class="btn btn-danger">Dzest</a></td>
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
                    url : '{{URL::to('lietvsearch')}}',
                    data:{'search':$value},

                    success:function(data){
                    $('tbody.seit3').html(data);
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
