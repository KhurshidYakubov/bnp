@extends('layouts.main')
@section('content')

    <div id="wrapper">
        @include('admin.components.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('admin.components.navbar')

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ __('main.update') }}</h1>
                    </div>

                    <form action="{{ route('socials.update', $post->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('main.link') }}</strong>
                                    <input type="text" name="link" class="form-control" value="{{ $post->link }}"
                                           placeholder="www.example.com">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('main.name') }}</strong>
                                    <input type="text" name="static" class="form-control" value="{{ $post->static }}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('main.image') }}</strong>
                                    <input type="file" class="form-control-file" name="img" value="">
                                </div>
                                <img src="/storage/images/{{ $post->img }}" style="width: 100px; background: #1a202c;" alt="">
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">{{ __('main.update') }}</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
@endsection
