@extends('layouts.main')
@section('content')

    <div id="wrapper">
        @include('admin.components.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('admin.components.navbar')

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ __('main.update') }}</h1>
                    </div>

                    <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
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
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <select name="mainmenu" class="form-control">
                                        <option value="">--{{ __('main.main_menu') }}--</option>
                                        @foreach($main_menu as $item)
                                            <option
                                                value="{{ $item->id }}" {{ $item->id == $menu->parent_id ? 'selected' : '' }} > {{ $item->translate(app()->getLocale())->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="oz" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group">
                                    <label class="required" for="oz_title">{{ __('main.name') }} | O'z</label>
                                    <input class="form-control {{ $errors->has('oz_title') ? 'is-invalid' : '' }}"
                                           type="text" name="oz_name" id="oz_title"
                                           value="{{ $menu->translate('oz')->name ?? '' }}"
                                           required>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="uz" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="form-group">
                                    <label for="uz_title">{{ __('main.name') }} | Ўз</label>
                                    <input class="form-control {{ $errors->has('uz_name') ? 'is-invalid' : '' }}"
                                           type="text" name="uz_name" id="uz_title"
                                           value="{{ $menu->translate('uz')->name ?? '' }}">
                                </div>
                            </div>

                            <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="form-group">
                                    <label for="ru_title">{{ __('main.name') }} | Ру</label>
                                    <input class="form-control {{ $errors->has('ru_name') ? 'is-invalid' : '' }}"
                                           type="text" name="ru_name" id="ru_title"
                                           value="{{ $menu->translate('ru')->name ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('main.order') }}</strong>
                                    <input type="number" name="order" class="form-control" placeholder="1"
                                           value="{{ $menu->order }}">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('main.link') }}</strong>
                                    <input type="text" name="link" class="form-control" placeholder="/about"
                                           value="{{ $menu->link }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">{{ __('main.update') }}</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
@endsection
