<?php

namespace App\Http\Controllers;
use App\Models\Accountant;
use Illuminate\Http\Request;

class AccountantContoller extends Controller
{

    public function index()
    {
        return view('components.accountant.allaccountants', [
            'rows' => Accountant::with('user')->limit(10)->get(),
            'title' => 'Accountants'
        ]);
    }


    public function create()
    {
        return view('components.accountant.addaccountant');
    }


    public function store(Request $request)
    {
        $accountant=new Accountant();
        $accountent->email=$request->email;
        $accountent->save();

        return  redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $accountant= Accountant::find($id);
        $accountant->delete();
        return  redirect()->back();
    }
}
