<!-- Page Header Start -->
<div class="container-fluid page-header p-0 mb-5 wow fadeIn"
    data-wow-delay="0.1s" style="background-image: url({{asset('src/img/carousel1.jpg')}}); " >
    <div class="container text-center py-5" style="background: rgba(209, 0, 0, .6);">
        <h1 class="display-4 text-white animated slideInDown mb-4">{{ $titulo }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $subtitulo }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
