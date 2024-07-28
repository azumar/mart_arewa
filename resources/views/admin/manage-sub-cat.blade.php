@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8">

        <table style="border: 1px solid grey; margin-bottom: 10px; align=center">

            <tbody>
                @foreach($subCategories as $subCategory)

                    <tr>
                        <td rowspan="4" style="border: 1px solid grey; padding-bottom: 2px; ">

                            <a href="/category/{{$subCategory->id}}"> <img src="/pictures/{{ $subCategory->sub_category_image }}"
                                    style="width:160px;margin-top: 0px;"></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Sub Category Code: {{$subCategory->sub_category_Id}}</td>
                    </tr>
                    <tr>
                        <td>Sub Category Name: {{$subCategory->sub_category_name}}</td>
                    </tr>

                    <tr>
                        <td style="border-bottom: 2px solid grey; ">Sub Category Description:
                            {{$subCategory->sub_category_description}}</td>
                    </tr>

                @endforeach


            </tbody>
        </table>

    </div>


    <div class="col-md-4">
        <div class="container mt-5">
            <h5>Create Sub-Category of  {{ $category->category_code}}</h5>
            <form action="{{route('sub_category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="sub_category_name" class="form-label">Sub-Category Name</label>
                    <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" required>
                </div>
                <div class="mb-3">
                    <label for="sub_category_description" class="form-label">Sub-Category Description</label>
                    <input type="text" class="form-control" id="sub_category_description"
                        name="sub_category_description" required>
                </div>
                <input type="hidden" name="category_id" value="{{ $category->id }}">
                <div class="mb-3">
                    <label for="sub_category_image" class="form-label">Sub-Category Image</label>
                    <input type="file" class="form-control" id="sub_category_image" name="sub_category_image"
                        accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="sub_category_slug" class="form-label">Sub-Category Slug</label>
                    <input type="text" class="form-control" id="sub_category_slug" name="sub_category_slug" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>

@endsection