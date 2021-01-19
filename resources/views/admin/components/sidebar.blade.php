<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <img src="{{ asset('images/logo_uzinfocom.svg') }}" alt="" style="width: 200px;">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('main.dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('menus.index')}}">
            <i class="fas fa-fw fa-bars"></i>
            <span>{{ __('main.menus') }}</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('posts.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>{{ __('main.news') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('banners.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>{{ __('main.banners') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('about.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>{{ __('main.about_us') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('programs.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>{{ __('main.programs') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('teachers.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>{{ __('main.teachers') }}</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('merits.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>{{ __('main.merits') }}</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('activities.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>{{ __('main.activities') }}</span></a>
    </li>

{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{ route('categories.index') }}">--}}
{{--            <i class="fas fa-fw fa-stream"></i>--}}
{{--            <span>Categories</span></a>--}}
{{--    </li>--}}

    <li class="nav-item">
        <a class="nav-link" href="{{ route('photos.index') }}">
            <i class="fas fa-fw fa-images"></i>
            <span>{{ __('main.photo_gallery') }}</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('socials.index') }}">
            <i class="fas fa-fw fa-share-square"></i>
            <span>{{ __('main.socials') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pages.index') }}">
            <i class="fas fa-fw fa-copy"></i>
            <span>{{ __('main.pages') }}</span></a>
    </li>

{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{ route('test.index') }}">--}}
{{--            <i class="fas fa-fw fa-images"></i>--}}
{{--            <span>Test</span></a>--}}
{{--    </li>--}}

</ul>
<!-- End of Sidebar -->
