@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <br/>
        <h3>Edit Record</h3>
        <br/>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{action('StudentController@update', $id)}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH"/>
            <!-- first_name -->
            <div class="form-group">
                <input type="text" name="first_name" class="form-control" value="{{$student->first_name}}" placeholder="Enter First Name">
            </div>
            <!-- Last_name -->
            <div class="form-group">
                <input type="text" name="last_name" class="form-control" value="{{$student->last_name}}" placeholder="Enter Last Name">
            </div>
            <!-- Button Submit -->
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Edit">
            </div>

        </form>
    </div>
</div>



@endsection