@extends('layouts.app')

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
                        <form action="{{ route("article.update",$article->id) }}" method="post">
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
                            <a href="{{route("article.index")}}" class="btn btn-outline-primary">Go Back</a>
                            <button class="btn btn-primary">Update Article</button>
                        </form>
                    </div>
                </div>
            </div>
        </dia>
    </div>
@endsection
