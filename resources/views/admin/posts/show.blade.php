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
                        <h1 class="h3 mb-0 text-gray-800">{{ __('main.post') }} {{ $post_view->id }}</h1>
                        <form action="{{ route('posts.destroy', $post_view->id) }}" method="POST">
                            <a href="{{route('posts.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i></a>
                            <a href="{{ route('posts.index') }}"
                               class="btn btn-success btn-sm">
                                <i class="fas fa-list"></i>
                            </a>
                            <a href="{{ route('posts.edit', $post_view->id) }}"
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
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 20px;">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oz" role="tab"
                               aria-controls="home" aria-selected="true">EN</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#uz" role="tab"
                               aria-controls="profile" aria-selected="false">ЎЗ</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ru" role="tab"
                               aria-controls="contact" aria-selected="false">РУ</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="oz" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.title') }}:</td>
                                    <th scope="row">{{ $post_view->translate('en')->title ?? '' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ __('main.short_desc') }}:</td>
                                    <th scope="row">{{ $post_view->translate('en')->short_desc ?? '' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ __('main.body') }}:</td>
                                    <th scope="row">{!!  $post_view->translate('en')->body ?? '' !!}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="uz" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.title') }}:</td>
                                    <th scope="row">{{ $post_view->translate('uz')->title ?? '' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ __('main.short_desc') }}:</td>
                                    <th scope="row">{{ $post_view->translate('uz')->short_desc ?? '' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ __('main.body') }}:</td>
                                    <th scope="row">{!!  $post_view->translate('uz')->body ?? '' !!}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="contact-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.title') }}:</td>
                                    <th scope="row">{{ $post_view->translate('ru')->title ?? '' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ __('main.short_desc') }}:</td>
                                    <th scope="row">{{ $post_view->translate('ru')->short_desc ?? '' }}</th>
                                </tr>
                                <tr>
                                    <td>{{ __('main.body') }}:</td>
                                    <th scope="row">{!! $post_view->translate('ru')->body ?? '' !!}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td>{{ __('main.category') }}:</td>
                            <th scope="row">{{ $post_view->category->category_name}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.image') }}:</td>
                            <th scope="row">
                                <img src="/storage/images/{{ $post_view->img }}" style="width: 150px; " alt="">
                            </th>
                        </tr>
                        <tr>
                            <td>{{ __('main.link') }}:</td>
                            <th scope="row">{{ $post_view->link ?? __('main.not_set')}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.time') }}:</td>
                            <th scope="row">{{ $post_view->time ?? __('main.not_set')}}</th>
                        </tr>
                        </tbody>
                    </table>

                </div>


@endsection
