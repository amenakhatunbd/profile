<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Protfolio;
use Illuminate\Support\Facades\Storage;

class PortfolioPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $portfolios = Protfolio::all();
        // dd($portfolios);
        return view('pages.portfolio.list', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
        {
            return view('pages.portfolio.create');
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
            'sub_image'=>'required|image',
            'small_image'=>'required|image',
            'description'=>'required|string',
            'clint'=>'required|string',
            'category'=>'required|string'
        ]);
        $portfolios = new Protfolio;
        $portfolios->title = $request->title;
        $portfolios->description = $request->description;
        $portfolios->clint = $request->clint;
        $portfolios->category = $request->category;

        $big_file= $request->file('sub_image');
        // dd($big_file);
        Storage::putfile('public/image/', $big_file);
        $portfolios->sub_image="storage/image/".$big_file->hashName();

       
        $small_file= $request->file('small_image');
        Storage::putfile('public/image/', $small_file);
        $portfolios->small_image="storage/image/".$small_file->hashName();


        $portfolios->save();
        return redirect()->route('admin.portfolio.list')->with('success', 'portfolios successfully');
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
        $portfolios = Protfolio::find($id);
        return view('pages.portfolio.edit',compact('portfolios'));
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
            'description'=>'required|string',
            'clint'=>'required|string',
            'category'=>'required|string'
        ]);
        $portfolios = Protfolio::find($id);
        $portfolios->title = $request->title;
        $portfolios->description = $request->description;
        $portfolios->clint = $request->clint;
        $portfolios->category = $request->category;

        if($request->file('sub_image')){
            $big_file= $request->file('sub_image');
    // dd($big_file);
            Storage::putfile('public/image/', $big_file);
            $portfolios->sub_image="storage/image/".$big_file->hashName();

        }
        
       if($request->file('small_image')){
        $small_file= $request->file('small_image');
        Storage::putfile('public/image/', $small_file);
        $portfolios->small_image="storage/image/".$small_file->hashName();
       }
        


        $portfolios->save();
        return redirect()->route('admin.portfolio.list')->with('success', 'update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolios = Protfolio::find($id);
        @unlink(public_path($portfolios->sub_image));
        @unlink(public_path($portfolios->small_image));
        $portfolios->delete();

        return redirect()->route('admin.portfolio.list')->with('success', 'data deleted successfully');

    }
}
