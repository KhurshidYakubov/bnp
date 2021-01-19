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
                        <h1 class="h3 mb-0 text-gray-800">{{ __('main.menu') }} {{ $menu_view->id }}</h1>
                        <form action="{{ route('menus.destroy', $menu_view->id) }}" method="POST">
                            <a href="{{route('menus.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i></a>
                            <a href="{{ route('menus.index') }}"
                               class="btn btn-success btn-sm">
                                <i class="fas fa-list"></i>
                            </a>
                            <a href="{{ route('menus.edit', $menu_view->id) }}"
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
                               aria-controls="home" aria-selected="true">O'Z</a>
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
                                    <td>{{ __('main.name') }}:</td>
                                    <th scope="row">{{ $menu_view->translate('oz')->name ?? '' }}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="uz" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.name') }}:</td>
                                    <th scope="row">{{ $menu_view->translate('uz')->name ?? '' }}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="contact-tab">
                            <table class="table table-striped table-hover">
                                <tbody>
                                <tr>
                                    <td>{{ __('main.name') }}:</td>
                                    <th scope="row">{{ $menu_view->translate('ru')->name ?? '' }}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td>{{ __('main.relashion') }}:</td>
                            <th scope="row">{{ $menu_view->submenus->name ?? __('main.main_menu')}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.order') }}:</td>
                            <th scope="row">{{ $menu_view->order ?? __('main.not_set')}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.link') }}:</td>
                            <th scope="row">{{ $menu_view->link ?? __('main.not_set')}}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
