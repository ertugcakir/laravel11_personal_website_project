<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('seo_title')</title>
    <meta name="description" value="@yield('seo_meta_description')">
    @yield('open_graph_data')
    <link rel="icon" type="image/png" href="{{ asset('uploads/'.$global_setting_data->favicon) }}">
    @include('front.layout.styles')
    <style>
        nav .nav-item .nav-link.active,
        nav .nav-item .nav-link:hover,
        .home-banner .left .button a,
        .heading h2,
        h2.title,
        .item:before,
        .item .icon,
        .widget h2,
        .category a,
        .comment h2,
        .project-detail .item .name,
        .widget a,
        .page-link a:link, .page-link a:visited,
        .home-about .right h3,
        .home-about .contact-info i,
        .comment .comment-box .right .reply a {
            color: {{ $global_setting_data->theme_color }} !important
        }
        .home-banner,
        .item .button a,
        .social ul li,
        .filter ul li,
        .scrollup i,
        .testimonial-carousel .owl-dot.active span{
            background: {{ $global_setting_data->theme_color }} !important
        }

        .item .v-line,
        .home-skill .progress-bar,
        .client-carousel .owl-dot.active span
        {
            background-color:{{ $global_setting_data->theme_color }} !important
        }
        .item .icon i {
            color: {{ $global_setting_data->theme_color }} !important
        }
        .filter ul li.active {
            background-color: #4f4f4f !important;
        }
        .active>.page-link, .page-link.active {
            background-color: {{ $global_setting_data->theme_color }} !important;
            border-color: {{ $global_setting_data->theme_color }} !important;
        }

    </style>
</head>
<body>

    @if($global_setting_data->preloader_status)
    <div id="preloader">
        <div id="preloader_inner"></div>
    </div>
    @endif

@include('front.layout.nav')

    @yield('main_content')


    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo d-flex justify-content-center">
                        <img src="{{ asset('uploads/'.$global_setting_data->logo_footer) }}" alt="">
                    </div>
                    <div class="description">
                        {!! nl2br($global_setting_data->footer_text) !!}
                    </div>
                    <div class="social">
                        <ul>
                                @if($global_setting_data->footer_icon_1!='')
                                    <li><a href="{{ $global_setting_data->footer_icon_1_url }}" target="_blank"><i class="{{ $global_setting_data->footer_icon_1 }}"></i></a></li>
                                @endif
                                @if($global_setting_data->footer_icon_2!='')
                                    <li><a href="{{ $global_setting_data->footer_icon_2_url }}" target="_blank"><i class="{{ $global_setting_data->footer_icon_2 }}"></i></a></li>
                                @endif
                                @if($global_setting_data->footer_icon_3!='')
                                    <li><a href="{{ $global_setting_data->footer_icon_3_url }}" target="_blank"><i class="{{ $global_setting_data->footer_icon_3 }}"></i></a></li>
                                @endif
                                @if($global_setting_data->footer_icon_4!='')
                                    <li><a href="{{ $global_setting_data->footer_icon_4_url }}" target="_blank"><i class="{{ $global_setting_data->footer_icon_4 }}"></i></a></li>
                                @endif

                        </ul>
                    </div>
                    <div class="copyright">
                        {{ $global_setting_data->footer_copyright }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="" class="scrollup">
        <i class="fas fa-chevron-up"></i>
    </a>

@include('front.layout.scripts_footer')
@yield('skill_animation')


@if($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            iziToast.error({
                title:'',
                position:'topRight',
                message:'{{ $error }}'
            });
        </script>
    @endforeach
@endif


@if (session()->get('error'))
<script>
    iziToast.error({
        title:'',
        position:'topRight',
        message:'{{ session()->get('error') }}'
    });
</script>
@endif


@if (session()->get('success'))
<script>
    iziToast.success({
        title:'',
        position:'topRight',
        message:'{{ session()->get('success') }}'
    });
</script>
@endif


</body>
</html>
