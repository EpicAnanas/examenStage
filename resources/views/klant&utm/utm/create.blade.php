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

  <form method="post" action="{{ route('utm.store') }}">
    @csrf
    <label for="url">Website URL: </label>
      <input type="text" name="url" value="">
        <label for="url">"De voledige website url bijvoorbeeld: www.example.com"</label>
      <br /><br />
    <label for="source">Campain Source: </label>
      <select name="source">
        <option value="" selected></option>
        <option value="google">google</option>
        <option value="facebook">facebook</option>
        <option value="linkedin">linkedin</option>
        <option value="instagram">instagram</option>
        <option value="twitter">twitter</option>
        <option value="youtube">youtube</option>
        <option value="vimeo">vimeo</option>
        <option value="e-mail">e-mail</option>
        <option value="pinterest">pinterest</option>
      </select><br /><br />
    <label for="medium">Campain Medium: </label>
      <select name="medium">
        <option value="" selected></option>
        <option value="cpc">cpc</option>
        <option value="post">post</option>
        <option value="referral">referral</option>
        <option value="newsletter">newsletter</option>
        <option value="banner">banner</option>
      </select><br /><br />
    <label for="name">Campain Name: </label>
      <input type="text" name="name" value=""><br /><br />
    <label for="term">Campain Term: </label>
      <input type="text" name="term" value=""><br /><br />
    <label for="content">Campain Content: </label>
      <input type="text" name="content" value=""><br /><br />
    <label for="klant">Kies je klant:</label>
      <select name="klant">
        <option value=""></option>
        @foreach ($klant as $post)
          <option value="{{$post->id}}">{{$post->name}}</option>
        @endforeach
      </select>
    <input type="submit" name="submit" value="Maak">
  </form>
  Wil je terug dan klik je <a href="./">hier</a>.
@endsection
