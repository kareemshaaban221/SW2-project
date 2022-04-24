<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receptionist;
class AssistantContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.assistant.allassistant', [
            'rows' => Receptionist::with('user')->limit(10)->get(),
            'title' => 'assistant'
        ]);
    }


    public function create()
    {
        return view('components.assistant.addassistant');
    }


    public function store(Request $request)
    {
        $assistant=new Assistant();
        $assistant->email=$request->email;
        $assistant->save();

        return  redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $assistant= Assistant::find($id);
        $assistant->delete();
        return  redirect()->back();
    }
}
