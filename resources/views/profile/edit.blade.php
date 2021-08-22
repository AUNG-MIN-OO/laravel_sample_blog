@extends('layouts.app')

@section('content')
    <div class="container">
        <dia class="row">
            <div class="col-12">
                @component('components.breadcrumb')
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                @endcomponent
                <div class="row">
                    <div class="col-12 col-md-4 m-auto">
                        <div class="card">
                            <div class="card-header bg-primary text-white">Edit Profile</div>

                            <div class="card-body">
                                <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image">Choose Image</label>
                                        <input type="file" id="image" class="form-control p-1" name="image">
                                        @error('image')
                                        <small class="text-danger font-weight-bold">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <a href="" class="btn btn-outline-primary">Go Back</a>
                                    <button class="btn btn-primary">Update Article</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        @isset($arr)
                            @foreach($arr as $a)
                                @if($a != "." && $a != "..")
                                    <ul>
                                        <li>
                                            <img src="{{asset('storage/'.$a)}}" style="width: 100px;" alt="">
                                        </li>
                                    </ul>
                                @endif
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </dia>
    </div>
@endsection
