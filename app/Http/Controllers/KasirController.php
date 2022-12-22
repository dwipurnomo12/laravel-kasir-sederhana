<?php

namespace App\Http\Controllers;

use App\Models\User;

use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::user();
        return view('kasir.index', [
            'users'   => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kasir.create', [
            'users' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'username'  => 'required',
            'password'  => 'required',
            'level'     => 'required'
        ]);

        // $validated['user_id'] = auth()->user()->id;

        User::create($validated);
        return redirect('/kasir')->with('success', 'Berhasil Menambahkan Data Kasir Baru');
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
    public function edit(User $user, $id)
    {
        return view('kasir.edit',[
            'users' => Auth::user(),
            'user'  => User::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'username'  => 'required',
            'password'  => 'required',
            'level'     => 'required'
        ];

        
        $validated = $request->validate($rules);

        User::where('id', $user->id)
            ->update($validated);
        
        return redirect('/kasir')->with('success', 'Berhasil Memperbarui Data Kasir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Berhasil Menghapus Data Kasir');
    }
}
