<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talep;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class YazarlikTalepController extends Controller
{
    public function __contruct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	if(Talep::where('user_id',Auth::user()->id)->count())
    	{
    		Session::flash('durum',3);
    		return redirect('/');
    	}
    	return view('yazarliktalebi');
    }

    public function gonder(Request $request)
    {
    	$this->validate($request,[
    		'aciklama' => 'required'
    	]);

    	$input = $request->all();
    	$input['user_id'] = Auth::user()->id;
    	Talep::create($input);

    	Session::flash('durum',2);
    	return redirect('/');
    }
}
