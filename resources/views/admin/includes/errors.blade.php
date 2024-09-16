@if($error = session()->get('error'))
    <div style="color:red;">{{$error}}</div>
@endif
