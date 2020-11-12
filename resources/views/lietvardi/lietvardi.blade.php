@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<h1>Lietvardi</h1>

<select name="sortBy" id="sortBy">
    <option value="asc">Ascending</option>
    <option value="desc">Descending</option>
</select>

<td><a href = '/lietvardi/pievienot' class="btn btn-primary">Pievienot lietvardu</a></td>
<input type="text" class="form-controller" id="search" placeholder="meklet" name="search"></input>
<table class="table table-striped">
  <thead>
                        <tr>
                            <th>ID</th>
                           <th>Lietvards</th>
                            <th>Pievienots</th>
                            <th>Pievienoja</th>

                        </tr>
                      </thead>
                      <tbody class="seit3">
                        @foreach($lietvardi as $lietvards)
                         @if($lietvards->apstiprinats_id==1)
                            <tr>
                                <td>{{$lietvards->id}}</td>
                                <td>{{$lietvards->lietvards}}</td>
                                <td>{{$lietvards->created_at}}</td>
                                <td>{{$lietvards->user}}</td>

                                <td><a href = '/lietvardi/rediget/{{ $lietvards->id }}' class="btn btn-secondary">Rediget</a></td>
                                <td><a href = '/lietvardi/delete/{{ $lietvards->id }}' onclick="return myFunction() "class="btn btn-danger">Dzest</a></td>
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
