@extends('layouts.main')
@section('content')

    <div id="wrapper">
        @include('components.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('components.navbar')

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User {{ $user->id }} Info</h1>
                    </div>
                    <table class="table table-hover">

                        <tbody>
                        <tr>
                            <td>Name:</td>
                            <th scope="row">{{ $user->name }}</th>
                        </tr>

                        <tr>
                            <td>Surname:</td>
                            <th scope="row">{{ $user->surname }}</th>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <th scope="row">{{ $user->email }}</th>
                        </tr>
                        <tr>
                            <td>Role:</td>
                            <th scope="row">{{ $user->roles[0]->role_name  }}</th>

                        </tr>
                        <tr>
                            <td>Region:</td>
                            <th scope="row">{{ $user->region->nameRu }}</th>
                        </tr>

                        <tr>
                            <td>Distirct:</td>
                            <th scope="row">{{ $user->region->nameRu }}</th>
                        </tr>

                        </tbody>
                    </table>

                </div>


@endsection
