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

  <h2>Update je url:</h2>
  <form method="post" action="{{ route('utm.update', $utm) }}">
    {{ method_field('PATCH') }}
    @csrf
    <div class="left">
      <label for="url">Je website URL is nu: </label>
        <input type="text" name="url" value="{{$utm->url}}">
          {{-- <label for="url">"De voledige website url bijvoorbeeld: www.example.com"</label> --}}
        <br /><br />
      <label for="source">Je campain cource is nu: </label>
        <select name="source">
          <option value="" {{ ($utm->medium == '' ? 'selected="selected"' : '') }}></option>
          <option value="google" {{ ($utm->source == 'google' ? 'selected="selected"' : '') }}>google</option>
          <option value="facebook" {{ ($utm->source == 'facebook' ? 'selected="selected"' : '') }}>facebook</option>
          <option value="linkedin" {{ ($utm->source == 'linkedin' ? 'selected="selected"' : '') }}>linkedin</option>
          <option value="instagram" {{ ($utm->source == 'instagram' ? 'selected="selected"' : '') }}>instagram</option>
          <option value="twitter" {{ ($utm->source == 'twitter' ? 'selected="selected"' : '') }}>twitter</option>
          <option value="youtube" {{ ($utm->source == 'youtube' ? 'selected="selected"' : '') }}>youtube</option>
          <option value="vimeo" {{ ($utm->source == 'vimeo' ? 'selected="selected"' : '') }}>vimeo</option>
          <option value="e-mail" {{ ($utm->source == 'e-mail' ? 'selected="selected"' : '') }}>e-mail</option>
          <option value="pinterest" {{ ($utm->source == 'pinterest' ? 'selected="selected"' : '') }}>pinterest</option>
        </select><br /><br />
      <label for="medium">Campain Medium: </label>
        <select name="medium">
          <option value="" {{ ($utm->medium == '' ? 'selected="selected"' : '') }}></option>
          <option value="cpc" {{ ($utm->medium == 'cpc' ? 'selected="selected"' : '') }}>cpc</option>
          <option value="post" {{ ($utm->medium == 'post' ? 'selected="selected"' : '') }}>post</option>
          <option value="referral" {{ ($utm->medium == 'referral' ? 'selected="selected"' : '') }}>referral</option>
          <option value="newsletter" {{ ($utm->medium == 'newsletter' ? 'selected="selected"' : '') }}>newsletter</option>
          <option value="banner" {{ ($utm->medium == 'banner' ? 'selected="selected"' : '') }}>banner</option>
        </select><br /><br />
    </div>
    <div class="right">
      <label for="name">Je campain name is nu: </label>
        <input type="text" name="name" value="{{$utm->name}}"><br /><br />
      <label for="term">Je campain term is nu: </label>
        <input type="text" name="term" value="{{$utm->term}}"><br /><br />
      <label for="content">Je campain content is nu: </label>
        <input type="text" name="content" value="{{$utm->content}}"><br /><br />
      {{-- <label for="klant">Komt bij de klant:</label>
        <select name="klant">
          <option value="{{$klant->id}}">{{$klant->name}}</option>
        </select> --}}
      {{-- <label for="klant">Kies je klant:</label>
      <select name="klant">
        <option value=""></option>
        @foreach ($klant as $post)
          <option value="{{$post->id}}">{{$post->name}}</option>
        @endforeach
      </select> --}}
    </div>
    <input type="submit" name="submit" value="Update">
  </form>

  <br />

  Wil je hem niet meer klik dan op deze knop:
  <form action="{{route('utm.destroy', $utm)}}" method="POST">
    {{ method_field('DELETE') }}
    @csrf
    <input type="submit" value="DELETE">
  </form>

  Wil je terug dan klik je <a href="javascript:history.back()">hier</a>.

@endsection
