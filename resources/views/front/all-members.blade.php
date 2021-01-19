@extends('layouts.front')
@section('content')

    <section class="page-banner" style="background-image: url({{ asset('images/news-banner.jpg') }});">
        <div class="page-banner-in">
            <div class="container">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"
                            aria-current="page"> {{ __('main.all_members') }}
                        </li>
                    </ol>
                </nav>

                <div class="page-banner-title">
                    <span> {{ __('main.all_members') }}</span>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                @foreach($team_members as $teacher)
                    <div class="col-xl-3 col-md-6">
                        <div class="teacher-in">
                            <div class="teacher-img">
                                <img src="storage/images/{{ $teacher->img }}">
                            </div>
                            <div class="teacher-name">
                                <span>{{ $teacher->translate(app()->getLocale())->short_desc }}</span>
                            </div>
                            <div class="teacher-position">
                                <span>{{ $teacher->translate(app()->getLocale())->title }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
