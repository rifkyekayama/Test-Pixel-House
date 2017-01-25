<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\User;
use Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::find(decrypt($id));
        return view('pages.profile', compact('user'));
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
        $user = User::find(decrypt($id));
        $request->get('name') !== null ? $user->name = $request->get('name') : '';
        $request->get('email') !== null ? $user->email = $request->get('email') : '';
        $request->get('password') !== null ? $user->password = bcrypt($request->get('password')) : '';
        $user->update();

        return redirect('beranda');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePicture(Request $request, $id)
    {
        //
        Storage::makeDirectory('foto');
        $file_foto = '';
        if($request->hasFile('foto')){
            $file_foto = 'foto/'.str_random(10).'.'.$request->file('foto')->getClientOriginalExtension();
            Storage::put($file_foto, file_get_contents($request->file('foto')));
        }

        $user = User::find(decrypt($id));
        $user->photo = $file_foto != '' ? $file_foto : '';
        $user->update();

        return redirect('beranda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
