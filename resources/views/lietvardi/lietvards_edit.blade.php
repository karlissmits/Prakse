@extends('layouts.app')

@section('content')

<h1>Rediget lietvardu</h1>
</head>
<body>
<form action = "/lietvardi/rediget/<?php echo $lietvards[0]->id; ?>" method = "post">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<table>

<tr>
<td>Lietvards</td>
<td>
<input type = 'text' name = 'lietvards'
value = '<?php echo$lietvards[0]->lietvards; ?>'/> </td>
</tr>

<tr>
<td>User</td>
<td>
<input type = 'text' name = 'user'
value = '<?php echo$lietvards[0]->user; ?>'/>
</td>
</tr>


<tr>
<td colspan = '2'>
<input type = 'submit'  value = "Saglabat" />
<a href="/lietvardi" class="btn btn-dark">Back</a>
</td>
</tr>
</table>
</form>
</body>

@endsection
