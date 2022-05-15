<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edica :: Home</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/aos/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/loader.js')}}"></script>
</head>
<body>
    <div class="edica-loader"></div>
    <header class="edica-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">

                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('post.index')}}">Петиції</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('category.index')}}">Категорії</a>
                        </li>
                        @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Авторизація</a>
                        </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('personal.main.index')}}">Особистий кабінет</a>
                            </li>
                            <li class="nav-item">
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <input class="btn btn-outline-primary" type="submit" value="Вийти">
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>

@yield('content');


    <footer class="edica-footer" data-aos="fade-up">
        <div class="container">
            <div class="row footer-widget-area">
                <div class="col-md-3">
                    <a href="index.html" class="footer-brand-wrapper">
                        Cайт для подання петицій
                    </a>
                    <p class="contact-details">dtymoshenko@com</p>
                    <p class="contact-details">+3805014469381</p>

                </div>
            </div>
        </div>
    </footer>
    <script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/aos/aos.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
        AOS.init({
            duration: 1000
        });
      </script>
</body>

</html>
