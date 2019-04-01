@extends('layout')
@section('content')
  <div class="">
    <h3>Je url is: {{$utm->url}}</h3>
    <h3>Je source is: {{$utm->source}}</h3>
    <h3>Je medium is: {{$utm->medium}}</h3>
    <h3>Je name is: {{$utm->name}}</h3>
    <h3>Je term is: {{$utm->term}}</h3>
    <h3>Je content is: {{$utm->content}}</h3>
    {{-- <h3>De klant waar het van is: {{$klant->name}}</h3> --}}
    <h3>{{$utm->created_at}} is je link gemaakt</h3>
    <br />
    {{-- <h5>{{$utm->url}}?utm_source={{$utm->source}}&utm_medium={{$utm->medium}}&utm_campaign={{$utm->name}}&utm_term={{$utm->term}}&utm_content={{$utm->content}}</h5> --}}

    <input type="text" value="<?php
        echo ($utm->url . '?');
        if($utm->source != ''){echo('utm_source=' . $utm->source);}
        if($utm->medium != ''){echo('&utm_medium=' . $utm->medium);}
        if($utm->name != ''){echo('&utm_campaign=' . $utm->name);}
        if($utm->term != ''){echo('&utm_term=' . $utm->term);}
        if($utm->content != ''){echo('&utm_content=' . $utm->content);} ?>
    " id="myInput" style="width:100%;">
    <button onclick="copy('myInput')">Copy text</button>

    <a href="./">Terug</a>
    <a href="{{$utm->id}}/edit">Edit</a>
  </div>
@endsection
