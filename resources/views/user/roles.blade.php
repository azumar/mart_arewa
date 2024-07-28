@extends('layouts.master')

@section('content')
<div class="col-sm-12">

    <div class="row">
        <!-- List roles here -->
        <div class="col-sm-8">
            <!-- Add Role here -->

            <table class="table table-hover">
                <thead>
                    <th> Role Name</th>
                    <th> Description of Role</th>
                </thead>
                @foreach($roles as $role )
                <tr>
                    <td>{{$role->roleName}}</td>

                    <td>{{$role->decription}}</td>
                    <td><a href="{{$role->id}}/delete"> Delete </a> </td>
                </tr>
                @endforeach
            </table>

        </div>

        <div class="col-sm-3">
            <form action="{{route('role.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="roleName">Role Code</label>
                    <input type="text" class="form-control" id="roleName" name="roleName">
                </div>
                <div class="form-group">
                    <label for="roleDescription">Role Description </label>
                    <input type="text" class="form-control" id="roleDescription" name="roleDescription">
                </div>
                </br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>

</div>
</div>


@endsection