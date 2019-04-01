<?php

namespace App\Http\Controllers;

use App\klant;
use App\utm;
use Illuminate\Http\Request;

class KlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $utm = utm::All();
      $klant = klant::orderByDesc("created_at")->paginate(8);

      return view('klant/index', compact('klant', 'utm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klant/create');
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
        'name' => 'required|max:255',
      ]);

      $klant = new klant();
      $klant->name = $request['name'];
      // $utm->link = $request['url'] . $request['source'] . $request['medium'] . $request['name'] . $request['term'] . $request['content'];
      // $post->user_id = Auth::id();

      $klant->save();
      return redirect('/utm')->with('success', 'Name has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\klant  $klant
     * @return \Illuminate\Http\Response
     */
    public function show(klant $klant)
    {
        // $utm = utm::orderByDesc("created_at")->paginate(20);
        $utm = utm::All();

        return view('klant/show', compact('klant', 'utm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\klant  $klant
     * @return \Illuminate\Http\Response
     */
    public function edit(klant $klant)
    {
      return view('klant/edit', compact('klant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\klant  $klant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, klant $klant)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:255',
      ]);

      $klant->name = $request['name'];

      $klant->save();
      return redirect('klant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\klant  $klant
     * @return \Illuminate\Http\Response
     */
    public function destroy(klant $klant)
    {
      $klant->delete();
      return redirect('klant');
    }
}
