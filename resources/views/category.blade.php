@extends('layouts.master')

@section('content')
<div class ="container">

    <div class="row">
        <div class="col-md-3">
        <table class="table table-responsive">
        <thead>
            <tr>
                <th>Column 1</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Row 1</td>
            </tr>
            <tr>
                <td>Row 2</td>
            </tr>
            <tr>
                <td>Row 3</td>
            </tr>
            <tr>
                <td>Row 4</td>
            </tr>
        </tbody>
    </table>
        </div>
        <div class="col-md-8">
        <table class="table table-responsive">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
                <th>Column 4</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Row 1, Column 1</td>
                <td>Row 1, Column 2</td>
                <td>Row 1, Column 3</td>
                <td>Row 1, Column 4</td>
            </tr>
        </tbody>
    </table>
            </div>

    </div>

</div>


@endsection