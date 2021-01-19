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
                        <h1 class="h3 mb-0 text-gray-800">{{ __('main.socials') }} {{ $post_view->id }}</h1>
                        <form action="{{ route('socials.destroy', $post_view->id) }}" method="POST">
                            <a href="{{route('socials.create')}}"
                               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus-circle"></i></a>
                            <a href="{{ route('socials.index') }}"
                               class="btn btn-success btn-sm">
                                <i class="fas fa-list"></i>
                            </a>
                            <a href="{{ route('socials.edit', $post_view->id) }}"
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

                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td>{{ __('main.link') }}:</td>
                            <th scope="row">{{ $post_view->link ?? __('main.not_set')}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.name') }}:</td>
                            <th scope="row">{{ $post_view->static ?? __('main.not_set')}}</th>
                        </tr>
                        <tr>
                            <td>{{ __('main.image') }}:</td>
                            <th scope="row">
                                <img src="/storage/images/{{ $post_view->img }}" style="width: 150px; " alt="">
                            </th>
                        </tr>
                        </tbody>
                    </table>

                </div>


@endsection
