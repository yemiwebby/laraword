@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>

                            Click the link below to upload your google doc to wordpress

                            <div class="links">
                                <a href="{{ url('/post/blog')}}">Upload document</a>
                            </div>
                        @endif

                        @if (session('posted'))
                            <div class="alert alert-success" role="alert">
                                {{ session('posted') }}
                            </div>

                            You can now click on the title of any of the post below to upload to wordpress
                        @endif

                            <div>
                                @if(count($posts) > 0)
                                    <div>
                                        <h4>POSTS FROM DRIVE</h4>
                                    </div>

                                    <div class="row ">
                                        <br>
                                        @foreach($posts as $post)
                                            <div class="col-md-4">
                                                <div class="card" style="width: 18rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title"> <a href="{{ url('/post/wp',$post->id)}}">{{$post->title}}</a></h5>
                                                        <p class="card-text"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
