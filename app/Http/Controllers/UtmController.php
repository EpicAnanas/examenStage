<?php

namespace App\Http\Controllers;

use App\utm;
use App\klant;
use Illuminate\Http\Request;

class UtmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $utm = utm::orderByDesc("created_at")->paginate(8);
      $klant = klant::All();

      return view('utm/index', compact('utm', 'klant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $klant = klant::All();
      return view('utm/create', compact('klant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'url' => 'required|max:255',
        'source' => 'nullable',
        'medium' => 'nullable',
        'name' => 'required',
        'term' => 'nullable|max:255',
        'content' => 'nullable|max:255',
        'klant' => 'required',
      ]);

      $utm = new utm();
      $utm->url = $request['url'];
      $utm->source = $request['source'];
      $utm->medium = $request['medium'];
      $utm->name = $request['name'];
      $utm->term = $request['term'];
      $utm->content = $request['content'];
      $utm->klant = $request['klant'];
      // $utm->link = $request['url'] . $request['source'] . $request['medium'] . $request['name'] . $request['term'] . $request['content'];
      // $post->user_id = Auth::id();

      $utm->save();
      return redirect('/utm')->with('success', 'Name has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\utm  $utm
     * @return \Illuminate\Http\Response
     */
    public function show(utm $utm)
    {
      $klant = klant::All();
      return view('utm/show', compact('utm', 'klant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\utm  $utm
     * @return \Illuminate\Http\Response
     */
    public function edit(utm $utm)
    {
        // $klant = utm::where("id")->paginate(8);
        $klant = klant::All();
        return view('utm/edit', compact('utm', 'klant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\utm  $utm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, utm $utm)
    {
      $validatedData = $request->validate([
        'url' => 'required|max:255',
        'source' => 'present',
        'medium' => 'present',
        'name' => 'required',
        'term' => 'present|max:255',
        'content' => 'present|max:255',
      ]);

      $utm->url = $request['url'];
      $utm->source = $request['source'];
      $utm->medium = $request['medium'];
      $utm->name = $request['name'];
      $utm->term = $request['term'];
      $utm->content = $request['content'];
      // $utm->link = $request['url'] . $request['source'] . $request['medium'] . $request['name'] . $request['term'] . $request['content'];

      $utm->save();
      return redirect('utm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\utm  $utm
     * @return \Illuminate\Http\Response
     */
    public function destroy(utm $utm)
    {
      $utm->delete();
      return redirect('utm');
    }
}
