@extends('layouts.front')
@section('content')

    <section class="page-banner" style="background-image: url({{ asset('images/news-banner.jpg') }});">
        <div class="page-banner-in">
            <div class="container">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"
                            aria-current="page">{{ __('main.media') }}
                        </li>
                    </ol>
                </nav>

                <div class="page-banner-title">
                    <span>{{ __('main.media') }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            <div class="row">
                @foreach($media as $item)

                    @if(empty($item->link) && empty($item->static))
                        @foreach(json_decode($item->image) as $img)
                            <div class="col-xl-4 col-lg-6">
                                <div class="page-foto-in">
                                    <a href="storage/images/gallery/{{ $img }}" data-fancybox="images"
                                       data-caption="{{ $item->title }}">
                                        <div class="page-foto-out">
                                            <img src="storage/images/gallery/{{ $img }}" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    @elseif(!empty($item->link))
                        <div class="col-xl-4 col-lg-6">
                            <div class="page-foto-in">
                                <a href="{{ $item->link }}"
                                   data-fancybox>
                                    <div class="page-foto-out page-video" data-caption="My caption">
                                        <img src="storage/images/{{ $item->anons_image }}" alt="icon">
                                    </div>
                                </a>
                            </div>
                        </div>
                        <style>
                            .page-video:before {
                                background-image: url({{ asset('images/play.png') }});
                            }
                        </style>

                    @elseif(!empty($item->static))
                        <div class="col-xl-4 col-lg-6">
                            <div class="page-foto-in">
                                <a data-fancybox data-type="iframe"
                                   data-src="https://utube.uz/embed/{{ $item->static }}"
                                   href="javascript:;">
                                    <div class="page-foto-out page-video" data-caption="My caption">
                                        <img src="storage/images/{{ $item->anons_image }}" alt="icon">
                                    </div>
                                </a>
                            </div>
                        </div>
                        <style>
                            .page-video:before {
                                background-image: url({{ asset('images/play.png') }});
                            }
                        </style>
                    @endif
                @endforeach
            </div>
            {{$media->links('front.pagination')}}
        </div>
    </section>
@endsection
