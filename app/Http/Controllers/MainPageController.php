<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main=Main::first();
         return view('pages.main', compact('main'));
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
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|string',
            'sub_title'=>'required|string'
        ]);
        $main = Main::first();
        $main->title = $request->title;
        $main->sub_title = $request->sub_title;

        if($request->file('bc_img')){
        $img_file = $request->file('bc_img');
        $img_file->storeAs('public/image', 'bc_img.'.$img_file->getClientOriginalExtension());
        $main->bc_img = 'storage/image/bc_img.'.$img_file->getClientOriginalExtension();
        }
        if($request->file('cv')){
        $pdf_file = $request->file('cv');
        $pdf_file->storeAs('public/pdf', 'cv.'.$pdf_file->getClientOriginalExtension());
        $main->cv = 'storage/pdf/cv.'.$pdf_file->getClientOriginalExtension();

    }
    $main->save();
    return redirect()->route('main')->with('success', 'success data');
    }

}

