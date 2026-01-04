<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Admin Panel</title>

    @include('admin.layout.styles')



    @include('admin.layout.scripts')
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <section class="section">
            <div class="container container-login">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary border-box">
                            <div class="card-header card-header-auth">
                                <h4 class="text-center">Yönetim Paneli - Giriş Ekranı</h4>
                            </div>
                            <div class="card-body card-body-auth">
                                @if(session()->get('success'))
                                    <div class="text-success mt-2"> {{ session('success') }}</div>
                                @endif
                                <form method="POST" action="{{ route('admin_login_submit') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-Posta Adresiniz" value="{{ old('email') }}" autofocus>
                                        @error('email')
                                            <div class="text-danger mt-2"> {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Parolanız" value="{{ old('password') }}">
                                        @error('password')
                                            <div class="text-danger mt-2"> {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        @if(session()->get('error'))
                                            <div class="text-danger mt-2"> {{ session('error') }}</div>
                                        @endif
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Giriş
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <a href="{{ route('admin_forget_password') }}">
                                                Şifreni mi unuttun?
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@include('admin.layout.scripts_footer')

</body>
</html>
