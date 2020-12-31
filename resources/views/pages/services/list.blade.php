@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List of service</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">List of service</li>
            </ol>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($services)>0)
                  
                  @foreach($services as $service)
                  <?php $i=1;?>
                  <tr>
                    <td scope="row"><?php echo $i; ?></td>
                    <td>{{$service->icon}}</td>
                    <td>{{$service->title}}</td>
                    <td>{{Str::limit(strip_tags($service->description),40)}}</td>
                    <td>
                      <div class="row">
                        <div class="col-sm-2">
                        <a href="{{route('admin.service.edit', $service->id)}}" class="btn btn-success" ><i class="fas fa-edit"></i></a>
                        </div>
                        <div class="col-sm-2">
                          <form action="{{route('admin.service.destroy', $service->id)}}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" name="submit"  class="btn btn-danger"><i class="fas fa-trash"></i></button>
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