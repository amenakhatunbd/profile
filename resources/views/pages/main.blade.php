@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Main</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Main</li>
            </ol>
        <form action="{{route ('admin.main.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('put')}}
            <div class="row">
                <div class="form-group col-md-4 mt-3">
                    <h1>Background Image</h1>
                    <img style="height: 30vh" src="{{url($main->bc_img)}}" alt="" class="img-thumbnail">
                    <input type="file" id="bc_img" name="bc_img" class="mt-3">
                </div>
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for="title"><h4>Title</h4></label>
                        <input type="text" id="title" name="title" class="form-control" value="{{$main->title}}">
                    </div>
                    <div class="mb-5">
                        <label for="sub_title"><h4>Sub Title</h4></label>
                        <input type="text" id="sub_title" name="sub_title" class="form-control" value="{{$main->sub_title}}">
                    </div>
                    <div>
                        <h4>Upload Resume</h4>
                        <input type="file" id="cv" name="cv">
    
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-danger mt-5">
        </div>
    </form>
    </main>
    
@endsection