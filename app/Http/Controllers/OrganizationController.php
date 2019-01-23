<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\User;

class OrganizationController extends Controller
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
        $data = Organization::all();
        return view('organization/home',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organization/create');
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
        $req->file('logo')->storeAs('public/organizations',$filename);
        
        // mass assigment
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'role' => 'AcountManager',
        ]);
        
        $user = User::where('email','=',$$req->email);
        
        Organization::create([
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'website' => $req->website,
            'logo' => $filename,
            'user_id' => $user->id,
        ]);        
    
        return redirect('/organization');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Organization::where('id','=',$id)->first();
        return view('organization/show',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Organization::where('id','=',$id)->first();
        return view('organization/edit',['data' => $data]);
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
        $req->file('logo')->storeAs('public/organizations',$filename);
        
        User::where('id','=',$req->id)->update([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'role' => 'AcountManager',
        ]);
        
        Organization::where('id','=',$req->id)
        ->update([
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'website' => $req->website,
            'logo' => $filename,
        ]);        

        return redirect('/organization');
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
         $org = Organization::where('id','=',$id);
         $org->delete();
         $user = User::where('id','=',$id);
         $user->delete();
         return redirect('/organization'); 
    }
}