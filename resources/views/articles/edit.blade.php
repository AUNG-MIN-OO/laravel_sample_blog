@extends('layouts.app')

@section('head')
    <style>
        .article-thumbnail{
            margin-right: 10px;
            margin-bottom: 10px;
            height: 150px;
            width: 150px;
            display: inline-block;
            border-radius: 0.25rem;
            background-size: cover;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <dia class="row">
            <div class="col-12">
                @component('components.breadcrumb')
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route("article.index")}}">Articles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Article</li>
                @endcomponent
                <div class="card">
                    <div class="card-header bg-primary text-white">Update Article</div>

                    <div class="card-body">
                        @inject("photo","App\Photo")
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <form action="{{ route("article.update",$article->id) }}" method="post" id="article-form">
                                    @csrf
                                    @method("put")
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" value="{{$article->title}}" class="form-control @error('title') is-invalid @enderror">
                                        @error("title")
                                        <small class="text-danger font-weight-bold">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="10">{{$article->description}}</textarea>
                                        @error("description")
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary" form="article-form">Update Article</button>
                                </form>
                            </div>
                            <div class="col-12 col-md-6">
                                @foreach($photo->where("article_id",$article->id)->get() as $img)
                                    <div class="d-inline-block">
                                        <div class="article-thumbnail shadow-sm" style='background-image: url("{{asset('storage/articles/'.$img->location)}}");'></div>
                                        <form action="{{route('photo.destroy',$img->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger" style="margin-top: -318px;margin-left: 85px;">Delete</button>
                                        </form>
                                    </div>
                                @endforeach
                                <form action="{{route('photo.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{$article->id}}">
                                    <div class="form-group">
                                        <label for="image">Choose Image</label>
                                        <input type="file" id="image" name="image[]" required multiple class="form-control p-1">
                                        @error("image.*")
                                        <small class="text-danger font-weight-bold">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary">Upload new photo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </dia>
    </div>
@endsection
