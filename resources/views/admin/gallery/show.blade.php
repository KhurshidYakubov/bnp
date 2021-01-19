@extends('layouts.main')
@section('content')

    <div id="wrapper">
        @include('admin.components.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('admin.components.navbar')

                <div class="container-fluid">
                    @include('admin.flash-message')
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ __('main.photo_gallery') }} {{ $images->id }}</h1>
                        <form action="{{ route('photos.destroy', $images->id) }}" method="POST">
                            <a href="{{route('photos.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i></a>
                            <a href="{{ route('photos.index') }}"
                               class="btn btn-success btn-sm">
                                <i class="fas fa-list"></i>
                            </a>
                            <a href="{{ route('photos.edit', $images->id) }}"
                               class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                    <div class="image-contain" style="text-align: center;">
                        @foreach(json_decode($images->image) as $item)
                            <a data-fancybox="gallery" href="/storage/images/gallery/{{$item}}">
                                <img src="/storage/images/gallery/{{$item}}" alt=""
                                     style="width: 50%; text-align: center; margin-bottom: 20px;">
                            </a>
                        @endforeach
                    </div>
                </div
@endsection
