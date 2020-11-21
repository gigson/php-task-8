@extends('layouts.app')

@section('content')

    <div class="container">
        @if($errors->any())
            <div>
                <ul style="color: red">
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

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
    <div class="container" style="margin-bottom: 50px">
        <h3>Categories:</h3>
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
        <h3>News:</h3>
        @foreach($newsList as $news)
            <div style="margin-bottom: 50px">
                <form action="{{ route('updateNews') }}" method="post" style="display:inline-block;"
                      enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="{{$news->title}}"><br>

                    <label for="desc">Description:</label>
                    <input type="text" id="desc" name="desc" value="{{$news->desc}}"><br>

                    <label for="short-desc">Short Description:</label>
                    <input type="text" id="short-desc" name="short-desc" value="{{$news->short_desc}}"><br>

                    <label for="published-time">Published Time:</label>
                    <input type="date" id="published-time" name="published-time" value="{{$news->published_time}}"><br>

                    <label for="image">New Image:</label>
                    <input type="file" id="image" name="image" style="display: inline"><br>
                    <img src="{{asset('images')."/".$news->image}}" style="max-height: 200px"><br>

                    <select name="category" id="category">
                        @foreach($categories as $category)
                            @if($category->id == $news->category_id)
                                <option selected="selected" value="{{$category->id}}">{{$category->title}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endif
                        @endforeach
                    </select><br>

                    <label>Tags:</label>
                    <input type="text" name="tags[]"
                           value="@isset($news->tags[0]->name){{$news->tags[0]->name}}@endisset">
                    <input type="text" name="tags[]"
                           value="@isset($news->tags[1]->name){{$news->tags[1]->name}}@endisset">
                    <input type="text" name="tags[]"
                           value="@isset($news->tags[2]->name){{$news->tags[2]->name}}@endisset">
                    <input type="text" name="tags[]"
                           value="@isset($news->tags[3]->name){{$news->tags[3]->name}}@endisset">
                    <input type="text" name="tags[]"
                           value="@isset($news->tags[4]->name){{$news->tags[4]->name}}@endisset"><br>

                    <input type="text" id="id" name="id" value="{{$news->id}}" hidden>
                    <input type="submit" value="Update">
                </form>
                <form action="{{ route('destroyNews') }}" method="post">
                    {!! csrf_field() !!}
                    <input type="text" id="id" name="id" value="{{$news->id}}" hidden>
                    <input type="submit" value="Delete">
                </form>
            </div>
        @endforeach


    </div>



@endsection
