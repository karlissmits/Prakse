@extends('layouts.app')
@section('content')
    <h1>Messages</h3>
    @if(count($contacts) > 0)
        @foreach($contacts as $contact)
            <div class="well">
                <h3>{{$contact->content}}</h3>
                <small>Sent on {{$contact->created_at}} by {{$contact->name}} E-mail: {{$contact->email}}</small>
                  <td><a href = 'answer/' onclick="return myFunction2()" class="btn btn-secondary">Answer</a></td>
                  <td><a href = 'delete/{{ $contact->id }}' onclick="return myFunction()" class="btn btn-danger">Delete</a></td>
            </div>
        @endforeach

    @else
        <p>No posts found</p>
    @endif
@endsection



<script>
  function myFunction() {
  var r = confirm("Are You Sure?");
      if (r == false) {
          return false;
        }

      }
    </script>
