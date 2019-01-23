<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Person;
use App\Organization;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function index()
    {
        if (Auth::user()->role == 'AcountManager') {
            $data = Person::where('organization_id','=',Auth::user()->organization->id)->get();
            return view('person/home',['data' => $data]);
        }else{
            $data = Person::all();
            return view('person/home',['data' => $data]);
        }    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Organization::all();
        return view('person/create',['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $filename = $req->id.time().'.png';
        $req->file('avatar')->storeAs('public/person',$filename);
        
        // mass assigment
        Person::create([
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'avatar' => $filename,
            'organization_id' => $req->organization_id,
        ]);
    
        return redirect('/person');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Person::where('id','=',$id)->first();
        return view('person/show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Person::where('id','=',$id)->first();
        $org = Organization::all();
        return view('person/edit',['data'=>$data,'org'=>$org]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $filename = $req->id.time().'.png';
        $req->file('avatar')->storeAs('public/person',$filename);
        
        // mass assigment
        Person::where('id','=',$req->id)
        ->update([
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'avatar' => $filename,
            'organization_id' => $req->organization_id,
        ]);
    
        return redirect('/person');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete biasa & softdeletes
        $org = Person::where('id','=',$id);
        $org->delete();
        return redirect('/person');
    }
}
