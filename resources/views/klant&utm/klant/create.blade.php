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

  <form method="post" action="{{ route('klant.store') }}">
    @csrf
    <label for="klant">Klant naam: </label>
      <input type="text" name="name" value="">
      <br /><br />
    <input type="submit" name="submit" value="Maak">
  </form>
  Wil je terug dan klik je <a href="./">hier</a>.
@endsection
