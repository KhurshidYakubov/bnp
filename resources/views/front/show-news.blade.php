@extends('layouts.front')
@section('content')
    <section class="page-banner" style="background-image: url({{ asset('images/news-banner.jpg') }});">
        <div class="page-banner-in">
            <div class="container">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item" aria-current="page">Yangiliklar</li>
                    </ol>
                </nav>

                <div class="page-banner-title">
                    <span>Yangiliklar batafsili</span>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="news-out">
                        <div class="page-news-img">
                            <img src="/storage/images/{{ $post->img }}">
                        </div>
                        <div class="news-in">
                            <div class="news-date">
                                <img src="{{ asset('images/date.svg') }}">
                                <span>{{ $post->time }}</span>
                            </div>
                            <div class="news-in-title">
                                <span>{{ $post->translate(app()->getLocale())->title }}</span>
                            </div>
                            <div class="news-text">
                                {!! $post->translate(app()->getLocale())->body !!}
                            </div>
                            <div class="news-tags">
                                <div class="row">
                                    <div class="col-xl-8 tags-left">
                                        <span>Tags:</span>
                                        @foreach($post->tags as $tag)
                                            <a href="{{ route('sorted_tag', $tag->name) }}">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                    <div class="col-xl-4 tags-right">
                                        @foreach($socials as $item)
                                            <a href="{{ $item->link }}">
                                                <img src="/storage/images/{{ $item->img }}" alt="icon">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="saidbar">
                        <div class="form-content">
                            <form action="">
                                <input type="text">
                                <button type="submit">
                                    <img src="{{ asset('images/sidebar-search.png') }}" alt="icon">
                                </button>
                            </form>
                        </div>
                        <div class="category">
                            <div class="category-title">
                                <span>Kategoriyalar</span>
                            </div>
                            <ul>
                                <li>
                                    <a href="#">Ta'lim</a>
                                </li>
                                <li>
                                    <a href="#">Ko'ngil ochish</a>
                                </li>
                                <li>
                                    <a href="#">Bolalar bo'g'chasi</a>
                                </li>
                                <li>
                                    <a href="#">Oziqlanish</a>
                                </li>
                            </ul>
                        </div>
                        <div class="saidbar-news">
                            <div class="saidbar-news-title">
                                <span>So'nggi xabarlar</span>
                            </div>
                            @foreach($sidebar_news as $item)
                                <div class="saidbar-news-item">
                                    <div class="saidbar-news-img">
                                        <a href="{{ route('shownews', $item->id ) }}">
                                            <img src="/storage/images/{{ $item->img }}" alt="">
                                        </a>
                                    </div>
                                    <div class="saidbar-news-date">
                                        <img src="{{ asset('images/date.svg') }}" alt="icon">
                                        <span>{{ $item->time }}</span>
                                    </div>
                                    <div class="saidbar-news-title">
                                        <a href="#">{{ $item->translate(app()->getLocale())->title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="saidbar-tags">
                            <div class="category-title">
                                <span>{{ __('main.popular_tags') }}</span>
                            </div>
                            <div class="saidbar-tags-content">
                                @foreach($popular_tags as $tag)
                                    <a href="{{ route('sorted_tag', $tag->name) }}">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
