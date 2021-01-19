@extends('layouts.main')
@section('content')

    <div id="wrapper">
        @include('admin.components.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('admin.components.navbar')

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Create a Post</h1>
                    </div>
                    <form action="{{ route('test.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oz" role="tab"
                                   aria-controls="home" aria-selected="true">O'Z</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#uz" role="tab"
                                   aria-controls="profile" aria-selected="false">UZ</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ru" role="tab"
                                   aria-controls="contact" aria-selected="false">RU</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="oz" role="tabpanel" aria-labelledby="home-tab">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="required" for="oz_title">Title (O'z)</label>
                                        <input class="form-control {{ $errors->has('oz_title') ? 'is-invalid' : '' }}"
                                               type="text" name="oz_title" id="oz_title"
                                               value="{{ old('oz_title', '') }}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="oz_body">Body (O'z)</label>
                                        <textarea class="form-control {{ $errors->has('oz_body') ? 'is-invalid' : '' }}"
                                                  name="oz_body" id="oz_body">{{ old('oz_body') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="uz" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="required" for="uz_title">Title (Uz)</label>
                                        <input class="form-control {{ $errors->has('uz_title') ? 'is-invalid' : '' }}"
                                               type="text" name="uz_title" id="uz_title"
                                               value="{{ old('uz_title', '') }}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="uz_body">Body (Uz)</label>
                                        <textarea class="form-control {{ $errors->has('uz_body') ? 'is-invalid' : '' }}"
                                                  name="uz_body" id="uz_body">{{ old('uz_body') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="required" for="ru_title">Title (Ru)</label>
                                        <input class="form-control {{ $errors->has('ru_title') ? 'is-invalid' : '' }}"
                                               type="text" name="ru_title" id="ru_title"
                                               value="{{ old('ru_title', '') }}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ru_body">Body (Ru)</label>
                                        <textarea class="form-control {{ $errors->has('ru_body') ? 'is-invalid' : '' }}"
                                                  name="ru_body" id="ru_body">{{ old('ru_body') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>


            </div>
@endsection
