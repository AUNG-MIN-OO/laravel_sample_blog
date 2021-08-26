@extends('layouts.app')

@section('head')
    <style>
        .article-thumbnail{
            margin-top: 10px;
            height: 50px;
            width: 50px;
            display: inline-block;
            border-radius: 0.25rem;
            background-size: cover;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @component('components.breadcrumb')
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Article</li>
                @endcomponent
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <span>Article List</span>
                        <div class="search">
                            <form action="{{route('article.search')}}" method="get" class="form-inline">
                                <input type="text" class="form-control mr-2" placeholder="Search" name="searchKey">
                                <button class="btn btn-success">Search</button>
                            </form>
                        </div>
                    </div>

                    {{ $articles->appends(Request::all())->links() }}
                    <table class="table table-striped table-responsive table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Creator</th>
                            <th>Controls</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td>{{$article->title}}</td>
                                <td>

                                    {{$article->getPhotos}}
                                    {{substr($article->description,0,50)."..."}}
                                    <br>
                                    @foreach($article->getPhotos as $img)
                                        <div class="article-thumbnail shadow-sm" style='background-image: url("{{asset('storage/articles/'.$img->location)}}");'></div>
                                    @endforeach
                                </td>
                                <td class="text-nowrap">{{$article->getUser->name}}</td>
                                <td class="text-nowrap">
                                    <a href="{{route("article.show",$article->id)}}" class="btn btn-sm btn-outline-success">Detail</a>
                                    <a href="{{route("article.edit",$article->id)}}" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <button class="btn btn-sm btn-outline-danger" form="delete">Delete</button>
                                    <form action="{{route('article.destroy',$article->id)}}" id="delete" method="post">
                                        @csrf
                                        @method("delete")
                                    </form>
                                </td>
                                <td class="text-nowrap">
                                    {{$article->created_at->format("d F Y")}}
                                    <br>
                                    {{$article->created_at->format("H:i A")}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
