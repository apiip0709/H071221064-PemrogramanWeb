<div class="container-fluid bg-dark text-white-50 footer mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-3">
        <div class="row g-5">
            <div class="{{ Auth::user() ? 'col-lg-4' : 'col-lg-6' }} col-md-6">
                <h5 class="text-white mb-4">Company</h5>
                <a class="btn btn-link text-white-50" href="{{ route('home') }}">Home</a>
                <a class="btn btn-link text-white-50" href="{{ route('about') }}">About Us</a>
                <a class="btn btn-link text-white-50" href="{{ route('contact') }}">Contact Us</a>
            </div>
            @if (Auth::user())
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-white mb-4">Jobs</h5>
                    <a class="btn btn-link text-white-50" href="{{ route('jobs') }}">Job Category</a>
                    <a class="btn btn-link text-white-50" href="{{ route('jobs') }}">Job List</a>
                    <a class="btn btn-link text-white-50" href="{{ route('jobs') }}">Job Detail</a>
                </div>
            @endif
            <div class="{{ Auth::user() ? 'col-lg-4' : 'col-lg-6' }} col-md-6">
                <h5 class="text-white mb-4">Contact</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Vet-Sel, Makassar, Indonesia</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 896 9509 6085</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>tugas.smtplib@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" target="_blank"
                        href="https://www.instagram.com/apiip.s/"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank"
                        href="https://www.facebook.com/AndiApiip/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank" href="https://github.com/apiip0709"><i
                            class="fab fa-github"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank"
                        href="https://www.linkedin.com/in/a-afif-alhaq-7b1289286/"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="{{ route('home') }}">JobNest Inventory</a>, All
                    Right Reserved.


                    Designed By <a class="border-bottom" target="_blank"
                        href="https://apiip0709.github.io/pw-portofolio/">Me</a>
                </div>
            </div>
        </div>
    </div>
</div>
