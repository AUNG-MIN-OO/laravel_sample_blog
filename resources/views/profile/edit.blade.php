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
                                <img src="{{ asset("storage/profile/".\Illuminate\Support\Facades\Auth::user()->image) }}" class="w-100 rounded" alt="">
                                <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image">Choose Image</label>
                                        <input type="file" id="image" class="form-control p-1" name="image">
                                        @error('image')
                                        <small class="text-danger font-weight-bold">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary w-100 mb-4">Update Profile</button>
                                    <a href="" class="btn btn-outline-primary w-100">Go Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
{{--                    <div>--}}
{{--                        @isset($arr)--}}
{{--                            @foreach($arr as $a)--}}
{{--                                @if($a != "." && $a != "..")--}}
{{--                                    <ul>--}}
{{--                                        <li>--}}
{{--                                            <img src="{{asset('storage/'.$a)}}" style="width: 100px;" alt="">--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        @endisset--}}
{{--                    </div>--}}
                </div>
            </div>
        </dia>
    </div>
@endsection
