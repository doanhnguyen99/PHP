@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <br>
        <h3 text-align="center">Student Data</h3>
        <br>

        <!-- @if($message = Session::get('Success'))
        <div class="alert alert-success">
            <p>{{@message}}</p>
        </div>
        @endif -->

        <div align="right">
        <a href="{{route('student.create')}}" class="btn btn-primary">Add</a>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($students as $row)
                <tr>
                    <td>{{$row['first_name']}}</td>
                    <td>{{$row['last_name']}}</td>
                    <td>
                        <a href="{{action('StudentController@edit', $row['id'])}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form method="post" class="delete-form" action="{{action('StudentController@destroy', $row['id'])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('.delete_form').on('submit', function(){
            if(confirm("Are you sure you want to delete it?")){
                return true;
            }else{
                return false;
            }
        });
    });
</script>
@endsection