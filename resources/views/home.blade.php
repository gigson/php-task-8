@extends('layouts.app')

@section('content')

    {{-- Category --}}
    <div class="container">
        <h3>Add New Category</h3>
        <form action="{{route('storeCategory')}}" method="post">
            {!! csrf_field() !!}
            <label for="title">Title:</label>
            <input type="text" id="title" name="title"><br>

            <input type="submit" value="Add category">
        </form>
    </div>
    <div class="container">
        <h3>Categories</h3>
        @foreach($categories as $category)

            <div>
                <form action="{{ route('updateCategory') }}" method="post" style="display:inline-block;">
                    {!! csrf_field() !!}
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="{{$category->title}}">

                    <input type="text" id="id" name="id" value="{{$category->id}}" hidden>
                    <input type="submit" value="Update">
                </form>
                <form action="{{ route('destroyCategory') }}" method="post" style="display:inline-block;">
                    {!! csrf_field() !!}
                    <input type="text" id="id" name="id" value="{{$category->id}}" hidden>
                    <input type="submit" value="Delete">
                </form>
            </div>
        @endforeach
    </div>

    {{-- news --}}
    <div class="container">
        <h3>Add New News</h3>
        <form action="{{route('storeNews')}}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <label for="title">Title:</label>
            <input type="text" id="title" name="title"><br>

            <label for="desc">Description:</label>
            <input type="text" id="desc" name="desc"><br>

            <label for="short-desc">Short Description:</label>
            <input type="text" id="short-desc" name="short-desc"><br>

            <label for="published-time">Published Time:</label>
            <input type="date" id="published-time" name="published-time"><br>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" style="display: inline"><br>

            <label for="category">Category:</label>
            <select name="category" id="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select><br>


            <label>Tags:</label>
            <input type="text" name="tags[]">
            <input type="text" name="tags[]">
            <input type="text" name="tags[]">
            <input type="text" name="tags[]">
            <input type="text" name="tags[]"><br>

            <input type="submit" value="Add News">
        </form>
    </div>
    <div class="container">
        <h3>News</h3>

    </div>



@endsection
