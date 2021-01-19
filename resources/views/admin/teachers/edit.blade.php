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

                    <form action="{{ route('teachers.update', $post->id) }}" method="POST" enctype="multipart/form-data"
                          autocomplete="off">
                        @method('PUT')
                        @csrf

                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 20px;">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oz" role="tab"
                                   aria-controls="home" aria-selected="true">O'Z</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#uz" role="tab"
                                   aria-controls="profile" aria-selected="false">УЗ</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ru" role="tab"
                                   aria-controls="contact" aria-selected="false">РУ</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="oz" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group">
                                    <label class="required" for="oz_title">{{ __('main.teachers_position') }} |
                                        O'z</label>
                                    <input class="form-control {{ $errors->has('oz_title') ? 'is-invalid' : '' }}"
                                           type="text" name="oz_title" id="oz_title"
                                           value="{{ $post->translate('oz')->title ?? '' }}"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="oz_short_desc">{{ __('main.teachers_name') }} |
                                        O'z</label>
                                    <input class="form-control {{ $errors->has('oz_short_desc') ? 'is-invalid' : '' }}"
                                           type="text" name="oz_short_desc" id="oz_short_desc"
                                           value="{{ $post->translate('oz')->short_desc ?? '' }}">
                                </div>
                            </div>

                            <div class="tab-pane fade" id="uz" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="form-group">
                                    <label for="uz_title">{{ __('main.teachers_position') }} | Уз</label>
                                    <input class="form-control {{ $errors->has('uz_title') ? 'is-invalid' : '' }}"
                                           type="text" name="uz_title" id="uz_title"
                                           value="{{ $post->translate('uz')->title ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="required" for="uz_short_desc">{{ __('main.teachers_name') }} | Уз</label>
                                    <input class="form-control {{ $errors->has('uz_short_desc') ? 'is-invalid' : '' }}"
                                           type="text" name="uz_short_desc" id="uz_short_desc"
                                           value="{{ $post->translate('uz')->short_desc ?? '' }}">
                                </div>
                            </div>

                            <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="form-group">
                                    <label for="ru_title">{{ __('main.teachers_position') }} | Ру</label>
                                    <input class="form-control {{ $errors->has('ru_title') ? 'is-invalid' : '' }}"
                                           type="text" name="ru_title" id="ru_title"
                                           value="{{ $post->translate('ru')->title ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="required" for="ru_short_desc">{{ __('main.teachers_name') }} | Ру</label>
                                    <input class="form-control {{ $errors->has('ru_short_desc') ? 'is-invalid' : '' }}"
                                           type="text" name="ru_short_desc" id="ru_short_desc"
                                           value="{{ $post->translate('ru')->short_desc ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('main.order') }}</strong>
                                    <input type="text" name="link" class="form-control" value="{{ $post->link }}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('main.image') }}</strong>
                                    <input type="file" class="form-control-file" name="img" value="">
                                </div>
                                <img src="/storage/images/{{ $post->img }}" style="width: 100px; " alt="">
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">{{ __('main.update') }}</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
@endsection
