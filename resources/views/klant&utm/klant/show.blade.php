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

  <h2>Maak een link aan:</h2>
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
      <label for="klant">Komt bij de klant:</label>
        <select name="klant">
          <option value="{{$klant->id}}">{{$klant->name}}</option>
        </select>
    </div>
    <input type="submit" name="submit" value="Maak Url">
  </form>

  {{-- <a href="../utm">Terug</a> --}}
  <a href="javascript:history.back()">Terug</a>
  <h1>Je bent op de pagina van {{$klant->name}}</h1>

  <input type="text" id="filter" onkeyup="filter()" placeholder="Search for dates..">

  <table id="table">
    <tr>
      <th>Datum</th>
      <th>Url:</th>
      <th></th>
    </tr>
    @foreach ($utm as $post)
      <?php
      if($post->klant == $klant->id){ ?>
        <tr>
          <td>
            {{$post->created_at}}
          </td>
          <td>
            <a href='https://<?php
                echo ($post->url . '?');
                if($post->source != ''){echo('utm_source=' . $post->source);}
                if($post->medium != ''){echo('&utm_medium=' . $post->medium);}
                if($post->name != ''){echo('&utm_campaign=' . $post->name);}
                if($post->term != ''){echo('&utm_term=' . $post->term);}
                if($post->content != ''){echo('&utm_content=' . $post->content);} ?>' target="_blank">
              <?php
                  echo ($post->url . '?');
                  if($post->source != ''){echo('utm_source=' . $post->source);}
                  if($post->medium != ''){echo('&utm_medium=' . $post->medium);}
                  if($post->name != ''){echo('&utm_campaign=' . $post->name);}
                  if($post->term != ''){echo('&utm_term=' . $post->term);}
                  if($post->content != ''){echo('&utm_content=' . $post->content);} ?>
            </a>
          </td>
          <td>
            <button>
              <a href="../utm/{{$post->id}}/edit">
                Edit
              </a>
            </button>
          </td>
        </tr>
      <?php } ?>
    @endforeach
  </table>
@endsection
