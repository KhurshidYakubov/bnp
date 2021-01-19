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

                    <form action="{{ route('photos.update', $image->id) }}" method="POST" enctype="multipart/form-data"
                          autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('main.title') }}</strong>
                                    <input type="text" class="form-control" name="title" value="{{ $image->title }}">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('main.link') }}</strong>
                                    <input type="text" class="form-control" name="link" value="{{ $image->link }}">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>utube.uz {{ __('main.link') }}</strong>
                                    <input type="text" class="form-control" name="static" value="{{ $image->static }}">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('main.anons_image') }}</strong>
                                    <input type="file" class="form-control-file" name="anons_image" value="">
                                </div>
                                <img src="/storage/images/{{ $image->anons_image }}" style="width: 100px;" alt="">
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('main.image') }}</strong>
                                    <input type="file" class="form-control-file" name="image[]" value="{{ $image->image }}" multiple>
                                </div>
                                @foreach(json_decode($image->image) as $item)
                                        <img src="/storage/images/gallery/{{$item}}" alt=""
                                             style="width: 100px;">
                                @endforeach
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">{{ __('main.update') }}</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
@endsection
