@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List of service</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">List of About</li>
            </ol>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    {{-- <th scope="col">ID</th> --}}
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Sub_title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($abouts)>0)
                  <?php $i=1;?>
                  @foreach($abouts as $about)
                  <tr>
                    <td scope="row"><?php echo $i; ?></td>
                    <td scope="row">{{$about->title}}</td>
                    <td scope="row">{{$about->sub_title}}</td>
                    <td>{{Str::limit(strip_tags($about->description),40)}}</td> 
                    <td><img src="{{url($about->image)}}" alt="pro" height="50px" width="50px"></td>

                    <td>
                      <div class="row">
                        <div >
                        <a href="{{route('admin.about.edit', $about->id)}}" class="btn btn-success m-2"  ><i class="fas fa-edit"></i></a>
                        </div>
                        <div >
                          <form action="{{route('admin.about.destroy', $about->id)}}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" name="submit"  class="btn btn-danger m-2"><i class="fas fa-trash"></i></button>
                          </form>
                        </div>
                      </div>
                    </td>

                  </tr>
                  <?php $i++; ?>
                  @endforeach
                 @endif
                </tbody>
              </table>
             </main>    
@endsection