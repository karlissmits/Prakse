@extends('layouts.app')

@section('content')

<h1>Edit User</h1>
</head>
<body>
<form action = "/edit/<?php echo $users[0]->id; ?>" method = "post">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<table>

<tr>
<td>Name</td>
<td>
<input type = 'text' name = 'name'
value = '<?php echo$users[0]->name; ?>'/> </td>
</tr>

<tr>
<td>Email</td>
<td>
<input type = 'text' name = 'email'
value = '<?php echo$users[0]->email; ?>'/>
</td>
</tr>

<tr>
<td>Password</td>
<td>
<input type = 'password' name = 'password'
</td>
</tr>

<tr>
<td>Confirm Password</td>
<td>
<input type = 'password' name = 'password_confirmation'
</td>
</tr>

<tr>
<td>Role</td>
<td>
<input type = 'text' name = 'role_id'
value = '<?php echo$users[0]->role_id; ?>'/>
</td>
</tr>

<tr>
<td colspan = '2'>
<input type = 'submit' value = "Update user" />
<a href="/admin" class="btn btn-dark">Back</a>
</td>
</tr>
</table>
</form>
</body>

@endsection
