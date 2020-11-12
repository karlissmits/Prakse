@extends('layouts.app')

@section('content')

<h1>Rediget lietvardu</h1>
</head>
<body>
<form action = "/darbibasvardi/rediget/<?php echo $darbibasv[0]->id; ?>" method = "post">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<table>

<tr>
<td>Darbibas vards</td>
<td>
<input type = 'text' name = 'darbibasv'
value = '<?php echo$darbibasv[0]->darbibasv; ?>'/> </td>
</tr>

<tr>
<td>User</td>
<td>
<input type = 'text' name = 'user'
value = '<?php echo$darbibasv[0]->user; ?>'/>
</td>
</tr>


<tr>
<td colspan = '2'>
<input type = 'submit'  value = "Saglabat" />
<a href="/darbibasvardi" class="btn btn-dark">Back</a>
</td>
</tr>
</table>
</form>
</body>

@endsection
