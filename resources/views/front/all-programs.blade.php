@extends('layouts.front')
@section('content')

    <section class="page-banner" style="background-image: url({{ asset('images/news-banner.jpg') }});">
        <div class="page-banner-in">
            <div class="container">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Library</li>
                    </ol>
                </nav>

                <div class="page-banner-title">
                    <span>{{ __('main.our_programs') }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section page-app">
        <div class="container">
            <div class="row">
                @foreach($programs as $item)
                    <div class="col-xl-4 col-lg-6">
                        <div class="app-in">
                            <a href="{{ route('showprograms', $item->id ) }}">
                                <div class="app-out">
                                    <div class="app-out-img">
                                        <img src="storage/images/{{ $item->img }}">
                                    </div>
                                    <div class="app-out-title">
                                        <span>{{ $item->translate(app()->getLocale())->title }}</span>
                                    </div>
                                    <div class="app-out-text">
                                        <span>{!! $item->translate(app()->getLocale())->short_desc !!}</span>
                                    </div>
                                    <div class="app-out-date row">
                                        <div class="col-sm-6 app-col">
                                            <span class="my-blue">{{ __('main.age') }}:</span>
                                            <span class="my-red">{{ $item->static }}</span>
                                        </div>
                                        <div class="col-sm-6 app-col">
                                            <span class="my-blue">{{ __('main.time') }}:</span>
                                            <span class="my-red">{{ $item->time }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                {{$programs->links('front.pagination')}}
            </div>
        </div>
    </section>

@endsection
