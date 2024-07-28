@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8">

        <table style="border: 1px solid grey; margin-bottom: 10px; align=center">

            <tbody>
                @foreach($categories as $category)

                    <tr>
                        <td rowspan="4" style="border: 1px solid grey; padding-bottom: 2px; ">
                            
                            <a href="/category/{{$category->id}}"> <img src="/pictures/{{ $category->category_image }}" style="width:260px;margin-top: 0px;"></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Category Code: {{$category->category_code}}</td>
                    </tr>
                    <tr>
                        <td>Category Name: {{$category->category_name}}</td>
                    </tr>
                    
                    <tr>
                        <td style="border-bottom: 2px solid grey; ">Category Description: {{$category->category_description}}</td>
                    </tr>

                @endforeach


            </tbody>
        </table>

    </div>
    <div class="col-md-4">

        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category_code">Category Code</label>
                <input type="text" class="form-control" id="category_code" name="category_code" required>
            </div>
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
            <div class="form-group">
                <label for="category_description">Category Description</label>
                <textarea class="form-control" id="category_description" name="category_description" rows="3"
                    required></textarea>
            </div>
            <div class="form-group">
                <label for="category_image">Category Image</label>
                <input type="file" class="form-control-file" id="category_image" name="category_image">
            </div>
            <div class="form-group">
                <label for="category_slug">Category Slug</label>
                <input type="text" class="form-control" id="category_slug" name="category_slug">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection