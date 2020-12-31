@if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" dtat-dismiss="alert">&times;</button>
                <strong>error!</strong>{{$error}}
            </div>
        @endforeach
       
@endif

@if (session('error'));
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" dtat-dismiss="alert">&times;</button>
        <strong>error!</strong>{{session('error')}}
    </div>   
@endif


@if (session('success'));
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" dtat-dismiss="alert">&times;</button>
        <strong>success!</strong>{{session('success')}}
    </div>   
@endif