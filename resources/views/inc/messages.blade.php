@if(count($errors)>0)
    @foreach($errors->all() as $error)

        <div class='alert alert-danger'>
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class='alert alert-success'>
        <p> Here is your awesome banner!</p>
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class='alert alert-danger'>
        {{session('error')}}
    </div>
@endif
