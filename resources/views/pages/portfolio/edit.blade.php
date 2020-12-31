@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        <form action="{{route('admin.portfolio.update', $portfolios->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-8 mt-3">
                    <div class="mb-3">
                        <label for="title"><h5>Title</h5></label>
                    <input type="text" id="title" name="title" class="form-control" value="{{$portfolios->title}}">
                    </div>                       
                    <div class="mb-3">
                        <label for="description"><h5>Description</h5></label>
                        <textarea name="description" id="description" cols="15" class="form-control"  rows="5">{{$portfolios->description}}</textarea> 
                    </div>
                    <div class="mb-3">
                        <label for="clint"><h5>Client</h5></label>
                        <input type="text" id="clint" name="clint" class="form-control" value="{{$portfolios->clint}}">
                    </div>
                    <div class="mb-3">
                        <label for="category"><h5>Category</h5></label>
                        <input type="text" id="category" name="category" class="form-control" value="{{$portfolios->category}}">
                    </div>
                </div>
                <div class="form-group col-md-4 mt-3">
                    <h5>Big Image</h5>
                <img style="height: 30vh" src="{{url($portfolios->sub_image)}}" alt="" class="img-thumbnail">
                    <input type="file" id="" name="sub_image" class="mt-3">
                
                    <h5>Small Image</h5>
                    <img style="height: 25vh" src="{{url($portfolios->small_image)}}" alt="" class="img-thumbnail">
                    <input type="file" id="" name="small_image" class="mt-3">
                    <input type="submit" name="submit" value="UPDATE" class="btn btn-danger mt-5">
                </div>    
            </div>
        </div>
    </form>
    </main>
    
@endsection