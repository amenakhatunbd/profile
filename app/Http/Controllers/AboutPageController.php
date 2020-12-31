<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\About;

class AboutPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $abouts = About::all();
        // dd($abouts);
        return view('pages.about.list', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.about.create');
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
            'title'=>'required|string',
            'sub_title'=>'required|string',
            'description'=>'required|string',
            'image'=>'required|image',
        ]);
        $abouts = new About;
        $abouts->title = $request->title;
        $abouts->sub_title = $request->sub_title;
        $abouts->description = $request->description;

        $image_file= $request->file('image');
        // dd($big_file);
        Storage::putfile('public/image/', $image_file);
        $abouts->image="storage/image/".$image_file->hashName();

       
        $abouts->save();
        return redirect()->route('admin.about.list')->with('success', 'abouts successfully');
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
        $abouts = About::find($id);
        return view('pages.about.edit',compact('abouts'));
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
        $this->validate($request, [
            'title'=>'required|string',
            'sub_title'=>'required|string',
            'description'=>'required|string',
        ]);
        $abouts =About::find($id);
        $abouts->title = $request->title;
        $abouts->sub_title = $request->sub_title;
        $abouts->description = $request->description;

        if($request->file('image')){
            $image_file= $request->file('image');
            Storage::putfile('public/image/', $image_file);
            $abouts->image="storage/image/".$image_file->hashName();
        }
            

       
        $abouts->save();
        return redirect()->route('admin.about.list')->with('success', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        $abouts = About::find($id);
        @unlink(public_path($abouts->image));
        $abouts->delete();

        return redirect()->route('admin.about.list')->with('success', 'data deleted successfully');

   

    }
}
