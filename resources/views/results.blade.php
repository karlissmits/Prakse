table style="width:100%">
<tr>
    <th>Name</th>
    <th>Logo</th>
</tr>
@if (isset($results) && count($results) > 0)
@foreach( $results as $business )
<tr>
    <td>{{ $business->logo }}</td>
    <td>{{ $business->name}}</td>
</tr>
@endforeach
@endif
