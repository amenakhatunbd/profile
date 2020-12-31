@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Create</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <form action="{{route('admin.about.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('put')}}
                <div class="row">
                    <div class="form-group col-md-8 mt-3">
                        <div class="mb-3">
                            <label for="title"><h5>Title</h5></label>
                            <input type="text" id="title" name="title" class="form-control" value="">
                        </div>                   
                        <div class="mb-3">
                            <label for="sub_title"><h5>Sub Title</h5></label>
                            <input type="text" id="sub_title" name="sub_title" class="form-control" value="">
                        </div>    
                        <div class="mb-3">
                            <label for="description"><h5>Description</h5></label>
                            <textarea name="description" id="description" cols="15" class="form-control" rows="5"></textarea> 
                        </div>
                    </div>
                    <div class="form-group col-md-4 mt-3">
                        <h5>Image</h5>
                        <img style="height: 25vh" src="" alt="" class="img-thumbnail">
                        <input type="file" id="" name="image" class="mt-3">
                        <input type="submit" name="submit" class="btn btn-danger mt-5">
                    </div>    
                </div>
            </div>
        </form>
    </main>
    
@endsection