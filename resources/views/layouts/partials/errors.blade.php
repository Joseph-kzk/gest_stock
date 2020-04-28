
@if(Session::has('success'))
<div class="container-fluid">
    <div class="col-lg-12 alert alert-success">
    {{Session::get('success')}}
    </div>
</div>
@elseif(Session::has('danger'))
<div class="container-fluid">
    <div class="col-lg-12 alert alert-danger">
    {{Session::get('danger')}}
    </div>
</div>
@endif

@if($errors->any())
<div class="container">
<div class="col-lg-12 alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
</div>
@endif
   