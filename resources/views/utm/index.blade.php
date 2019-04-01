@extends('layout')
@section('content')

<a href="javascript:history.back()">Terug</a>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <h2>Maak je link aan:</h2>
  <form method="post" action="{{ route('utm.store') }}">
    @csrf
    <div class="left">
      <label for="url">Website URL: </label>
        <input type="text" name="url" value="">
          {{-- <label for="url">"De voledige website url bijvoorbeeld: www.example.com"</label> --}}
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
    </div>
    <div class="right">
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
    </div>
    <input type="submit" name="submit" value="Maak">
  </form>

  <h2>Maak klant naam aan:</h2>
  <form method="post" action="{{ route('klant.store') }}">
    @csrf
    <label for="klant">Klant naam: </label>
      <input type="text" name="name" value="">
      <br /><br />
    <input type="submit" name="submit" value="Maak">
  </form>

  <input type="text" id="filter" onkeyup="filter()" placeholder="Search for names..">

  <table id="table">
    <tr>
      <th>Klant naam:</th>
      <th>Show klant</th>
      <th>Edit klant:</th>
    </tr>
    @foreach ($klant as $post)
        <tr>
          <td>
            {{$post->name}}
          </td>
          <td>
            <button>
              <a href="klant/{{$post->id}}">
                Show
              </a>
            </button>
          </td>
          <td>
            <button>
              <a href="klant/{{$post->id}}/edit">
                Edit
              </a>
            </button>
          </td>
        </tr>
    @endforeach
  </table>

@endsection
