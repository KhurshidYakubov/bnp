@extends('layouts.front')
@section('content')

    <section class="page-banner" style="background-image: url({{ asset('images/news-banner.jpg') }});">
        <div class="page-banner-in">
            <div class="container">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"
                            aria-current="page">{{ $page->translate(app()->getLocale())->title }}
                        </li>
                    </ol>
                </nav>

                <div class="page-banner-title">
                    <span>{{ $page->translate(app()->getLocale())->title }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="news-out">
                        <div class="news-in">
                            <div class="news-in-title">
                                <span>{{ $page->translate(app()->getLocale())->title }}</span>
                            </div>
                            <div class="news-text">
                                {!! $page->translate(app()->getLocale())->body !!}
                            </div>
                            <div class="news-tags">
                                <div class="row">
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
            </div>
        </div>
    </section>
@endsection
