<?php

namespace App\Http\Controllers;

use App\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
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
        // return view('criteria.index')->with([
        //     'criterias' => Criteria::orWhere('name','LIKE','%'.request('q').'%')->orWhere('weight','LIKE','%'.request('q').'%')->orderBy('id','DESC')->paginate(10)->appends(['q'=>request('q')]),
        // ]);

        return view('criteria.index')->with([
            'criterias' => Criteria::orWhere('name','LIKE','%'.request('q').'%')->orWhere('weight','LIKE','%'.request('q').'%')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criteria.create');
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
            'weight' => 'required|integer|max:5',
        ]);

        Criteria::create([
            'name' => $request->name,
            'weight' => $request->weight,
        ]);

        return redirect()->route('criteria.index')->with('info','Kriteria berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function show(Criteria $criteria)
    {
        return view('criteria.show')->with('criteria',$criteria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Criteria $criteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criteria $criteria)
    {
        $this->validate($request, [
            'name' => 'required',
            'weight' => 'required|integer|max:5',
        ]);

        $criteria->update([
            'name' => $request->name,
            'weight' => $request->weight,
        ]);

        return redirect()->route('criteria.index')->with('info','Kriteria berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Criteria $criteria)
    {
        $criteria->delete();

        return redirect()->route('criteria.index')->with('info','Kriteria berhasil dihapus');
    }
}
