@extends('layout')
@section('content')
  <a href="klant/create">create</a>
  <input type="text" id="filter" onkeyup="filter()" placeholder="Search for names..">

  <table id="table">
    <tr>
      <th>Name:</th>
      <th></th>
    </tr>
    @foreach ($utm as $post)
        <tr>
          <td>
            {{$post->name}}
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
          {{-- <td>
            <button>
              <a href="utm/{{$post->id}}/edit">
                Edit
              </a>
            </button>
          </td> --}}
        </tr>
    @endforeach
  </table>
  <div class="pagination">
    {{$klant->links()}}
  </div>
@endsection
