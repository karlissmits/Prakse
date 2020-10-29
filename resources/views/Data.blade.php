@extends('layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

  <div class="container">
		<h2>Sample CSV data</h2>
		<p>The data collected form a mock csv data is diaplayed here, the CSV
			file can be seen here.</p>

      <form action="{{url('/data')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="form-group">
                <label for="upload-file">Upload</label>
                <input type="file" name="upload-file" class="form-control">
            </div>
            <input class="btn btn-success" type="submit" value="Upload CSV" name="submit">
        </form>
		<div class="table-responsive">

<input type="text" class="form-controller" id="search" name="search"></input>

    	<table class="table">
				<thead>
					<tr>
						
						<th>Code</th>
						<th>Country</th>
						<th>Valid_from</th>
						<th>Valid_until</th>
            <th>Stunden</th>
            <th>One_day</th>
            <th>Lump_sum</th>
					</tr>
				</thead>
			<tbody class="seit2">
					@foreach($finaldata as $item)
					<tr>

						<td>{{$item->code}}</td>
						<td>{{$item->country}}</td>
						<td>{{$item->valid_from}}</td>
						<td>{{$item->valid_until}}</td>
            <td>{{$item->stunden}}</td>
            <td>{{$item->one_day}}</td>
            <td>{{$item->lump_sum}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>


  <script type="text/javascript">

  $('#search').on('keyup',function(){
  $value=$(this).val();
  $.ajax({
  type : 'get',
  url : '{{URL::to('datasearch')}}',
  data:{'search':$value},

  success:function(data){
  $('tbody.seit2').html(data);
  }
  });
  })
  </script>

@endsection
