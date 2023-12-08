<div class="container-fluid p-0">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-1.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Temukan pekerjaan start-up
                                terbaik yang sesuai denganmu.</h1>
                            <a href="{{ Auth::check() ? route('jobs') : route('login') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Mulai mencari</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-2.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Temukan pekerjaan start-up
                                terbaik yang sesuai denganmu.</h1>
                            <a href="{{ Auth::check() ? '#mulai' : route('login') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Mulai mencari</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
