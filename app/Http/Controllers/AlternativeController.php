<?php

namespace App\Http\Controllers;

use App\Alternative;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('alternative.index')->with([
        //     'alternatives' => Alternative::orWhere('name','LIKE','%'.request('q').'%')->orWhere('phone_number','LIKE','%'.request('q').'%')->orWhere('address','LIKE','%'.request('q').'%')->orderBy('id','DESC')->paginate(10)->appends(['q'=>request('q')]),
        // ]);

        return view('alternative.index')->with([
            'alternatives' => Alternative::orWhere('name','LIKE','%'.request('q').'%')->orWhere('phone_number','LIKE','%'.request('q').'%')->orWhere('address','LIKE','%'.request('q').'%')->orderBy('id','DESC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alternative.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'address' => 'required',
        ]);

        Alternative::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('alternative.index')->with('info','Alternatif berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function show(Alternative $alternative)
    {
        return view('alternative.show')->with('alternative',$alternative);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function edit(Alternative $alternative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternative $alternative)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'address' => 'required',
        ]);

        $alternative->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('alternative.index')->with('info','Alternatif berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternative $alternative)
    {
        $alternative->delete();

        return redirect()->route('alternative.index')->with('info','Alternatif berhasil dihapus');
    }
}
