@extends('layout')
@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <h2>Update de klant zijn naam:</h2>
  <form method="post" action="{{ route('klant.update', $klant) }}">
    {{ method_field('PATCH') }}
    @csrf
    <div class="left">
      <label for="name">Je naam is nu: </label>
        <input type="text" name="name" value="{{$klant->name}}">
        <br /><br />
    <input type="submit" name="submit" value="Edit naam">
  </form>

  <br />

  Wil je hem niet meer klik dan op deze knop:
  <form action="{{route('klant.destroy', $klant)}}" method="POST">
    {{ method_field('DELETE') }}
    @csrf
    <input type="submit" value="DELETE">
  </form>

  Wil je terug dan klik je <a href="./">hier</a>.

@endsection
