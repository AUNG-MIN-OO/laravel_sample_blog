@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @component('components.breadcrumb')
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route("article.index")}}">Articles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Article Detail</li>
                @endcomponent
                <div class="card">
                    <div class="card-header bg-primary text-white">Article Detail</div>

                    <div class="card-body">
                        @inject("users","App\User")
                        <h4>{{$article->title}}</h4>
                        <span class="badge-pill badge-primary p-1">{{$users->find($article->user_id)->name}}</span>
                        <span class="badge-pill badge-primary p-1">{{$article->created_at->format("d M Y")}}</span>
                        <hr>
                        <p>{{$article->description}}</p>
                        <a href="{{route('article.index')}}" class="btn btn-primary float-right">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
