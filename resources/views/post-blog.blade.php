@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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

                            You can now visit your wordpress site to publish your post
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
