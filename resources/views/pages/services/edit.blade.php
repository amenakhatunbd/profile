@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        <form action="{{route('admin.service.update', $services->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for="icon"><h4>Font Awesome Icon</h4></label>
                    <input type="text" id="icon" name="icon" class="form-control" value="{{$services->icon}}">
                    </div>
                    <div class="mb-5">
                        <label for="title"><h4>Title</h4></label>
                    <input type="text" id="title" name="title" class="form-control" value="{{$services->title}}">
                    </div>
                    <div class="mb-5">
                        <label for="description"><h4>Description</h4></label>
                        <textarea type="text" id="description" name="description" class="form-control" >{{$services->description}}</textarea>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-danger mt-5">
        </div>
    </form>
    </main>
    
@endsection