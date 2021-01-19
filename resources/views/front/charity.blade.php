@extends('layouts.front')
@section('content')
    <section class="page-banner" style="background-image: url({{ asset('images/news-banner.jpg') }});">
        <div class="page-banner-in">
            <div class="container">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"
                            aria-current="page">{{ __('main.donate') }}
                        </li>
                    </ol>
                </nav>

                <div class="page-banner-title">
                    <span>{{ __('main.donate') }}</span>
                </div>
            </div>
        </div>
    </section>


    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="give">
                        <img src="{{ asset('images/charity_card.jpg') }}">
                    </div>
                    <div class="give-content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
                            <div class="saidbar-news-item">
                                <div class="saidbar-news-img">
                                    <a href="#">
                                        <img src="img/img4.jpg" alt="">
                                    </a>
                                </div>
                                <div class="saidbar-news-date">
                                    <img src="img/date.svg" alt="icon">
                                    <span>28 dekabr 2020</span>
                                </div>
                                <div class="saidbar-news-title">
                                    <a href="#">Qattiq vaziyatlar kuchi odamlarni shakllantiradi</a>
                                </div>
                            </div>
                            <div class="saidbar-news-item">
                                <div class="saidbar-news-img">
                                    <a href="#">
                                        <img src="img/img5.jpg" alt="">
                                    </a>
                                </div>
                                <div class="saidbar-news-date">
                                    <img src="img/date.svg" alt="icon">
                                    <span>28 dekabr 2020</span>
                                </div>
                                <div class="saidbar-news-title">
                                    <a href="#">Qattiq vaziyatlar kuchi odamlarni shakllantiradi</a>
                                </div>
                            </div>
                        </div>
                        <div class="saidbar-tags">
                            <div class="category-title">
                                <span>Ommabop teglar</span>
                            </div>
                            <div class="saidbar-tags-content">
                                <a href="#">Talim</a>
                                <a href="#">Sinf xonalari</a>
                                <a href="#">Bolalar</a>
                                <a href="#">G'amxo'rlik</a>
                                <a href="#">Musiqa</a>
                                <a href="#">Tadbirlar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
