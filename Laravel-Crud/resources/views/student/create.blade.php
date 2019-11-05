@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br>
        <h3 aling="center">Data Input</h3>
        <br>

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(\Session::has('Success'))
            <div class="alert alert-success">
                <p>{{   \Session::get('Success')}}</p>
            </div>
        @endif

        <form action="{{url('student')}}" method="post">

            <div class="form-group">
                {{@csrf_field()}}
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control" name="first_name"  placeholder="Your First Name">
                <small id="emailHelp" class="form-text text-muted">We'll never share your first name with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Last Name</label>
                <input type="text" class="form-control" name="last_name"  placeholder="Your Last Name">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection