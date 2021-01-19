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
                    <span>{{ __('main.news') }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            <div class="row">
                @foreach($news as $item)
                    <div class="col-lg-6">
                        <div class="news-out">
                            <div class="news-img">
                                <img src="{{ url('storage/images/'.$item->img) }}">
                            </div>
                            <div class="news-in">
                                <div class="news-date">
                                    <img src="{{ asset('images/date.svg') }}">
                                    <span>{{ $item->time }}</span>
                                </div>
                                <div class="news-in-title">
                                    <span>{{ $item->translate(app()->getLocale())->title }}</span>
                                </div>
                                <div class="news-text">
                                    <span>{!! $item->translate(app()->getLocale())->short_desc !!}</span>
                                </div>
                                <div class="news-link">
                                    <a href="{{ route('shownews', $item->id ) }}">{{ __('main.more_2')  }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    {{$news->links('front.pagination')}}
            </div>
        </div>
    </section>

@endsection
