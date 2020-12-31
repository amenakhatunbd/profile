@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List of service</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">List of portfolio</li>
            </ol>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    {{-- <th scope="col">ID</th> --}}
                    <th scope="col">ID</th>
                    <th scope="col">title</th>
                    <th scope="col">sub_image</th>
                    <th scope="col">small_image</th>
                    <th scope="col">Description</th>
                    <th scope="col">clint</th>
                    <th scope="col">category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($portfolios)>0)
                  <?php $i=1;?>
                  @foreach($portfolios as $portfolio)
                  <tr>
                    <td scope="row"><?php echo $i; ?></td>
                    <td scope="row">{{$portfolio->title}}</td>
                    <td><img src="{{url($portfolio->sub_image)}}" alt="pro" height="50px" width="50px"></td>
                    <td><img src="{{url($portfolio->small_image)}}" alt="pro"height="50px" width="50px"></td>
{{-- 
                    <td>{{$portfolio->sub_image}}</td>
                    <td>{{$portfolio->small_image}}</td> --}}
                    <td>{{Str::limit(strip_tags($portfolio->description),40)}}</td>
                    <td>{{$portfolio->clint}}</td>
                    <td>{{$portfolio->category}}</td>

                    <td>
                      <div class="row">
                        <div >
                        <a href="{{route('admin.portfolio.edit', $portfolio->id)}}" class="btn btn-success m-2"  ><i class="fas fa-edit"></i></a>
                        </div>
                        <div >
                          <form action="{{route('admin.portfolio.destroy', $portfolio->id)}}" method="post">
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