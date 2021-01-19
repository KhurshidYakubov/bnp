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

    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-app-img">
                        <img src="/storage/images/{{ $post->img }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="app-page-right">
                        <div class="app-page-title">
                            <span>{{ $post->translate(app()->getLocale())->title }}</span>
                        </div>
                        <div class="app-page-content">
                            <p>{!! $post->translate(app()->getLocale())->body !!} </p>
                        </div>
                        <div class="app-page-date">
                            <span>{{ __('main.age') }}:</span>
                            <span>{{ $post->static }}</span>
                        </div>
                        <div class="app-page-date">
                            <span>Sinf:</span>
                            <span>Bir sinfda 20 bola</span>
                        </div>
                        <div class="app-page-date">
                            <span>{{ __('main.time') }}:</span>
                            <span>{{ $post->time }}</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="application mt-5">
        <div class="container">
            <div class="app-page-description">
                <span>Biz yana nimani o'rgatmoqdamiz</span>
            </div>
            <div class="site-title">
                <span>Bolalar o'rganadigan ko'nikmalar</span>
            </div>
            <div class="line application-line">
                <img src="{{ asset('images/line_blue.svg') }}">
            </div>
            <div class="application-row">
                <div class="row">
                    @foreach($programs_in as $item)
                        <div class="col-lg-4">
                            <div class="app-in">
                                <a href="{{ route('showprograms', $item->id ) }}">
                                    <div class="app-out">
                                        <div class="app-out-img">
                                            <img src="/storage/images/{{ $item->img }}">
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
                </div>
            </div>
        </div>
    </section>

    <section class="phone" style="background-image: url({{ asset('images/phone_back.jpg') }});">
        <div class="container">
            <div class="phone-text">
                <span>{{ __('main.call_for_title') }}<br>+998 72 222 79 86<br>+998 72 222 79 87</span>
            </div>
            <div class="phone-link">
                <a href="{{ route('allprograms') }}">
                    {{ __('main.all_programs') }}
                </a>
            </div>
        </div>
    </section>
@endsection
