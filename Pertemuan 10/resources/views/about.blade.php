@extends('layout.main', ['title' => '| About'])

@section('content')
    <!-- Spinner Start -->
    @include('partials.spinner')
    <!-- Spinner End -->

    <!-- Navbar Start -->
    @include('partials.navbar')
    <!-- Navbar End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0 about-bg rounded overflow-hidden">
                        <div class="col-6 text-start">
                            <img class="img-fluid w-100" src="img/about-1.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid w-100" src="img/about-4.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">Selamat datang di JobNest - Menghubungkan Bakat dengan Peluang</h1>
                    <p class="mb-4">Kami di JobNest percaya bahwa setiap individu berhak untuk menemukan pekerjaan yang sesuai dengan passion, keterampilan, dan ambisi mereka. Sebagai platform job portal yang inovatif, kami berkomitmen untuk mempertemukan para pencari kerja dengan peluang pekerjaan yang tepat.</p>
                    
                    <h3 class="mb-4">Misi Kami</h3>
                    <p class="mb-4">Di JobNest, misi kami adalah memudahkan proses pencarian pekerjaan bagi setiap individu. Kami menyediakan lingkungan yang ramah dan efisien di mana pencari kerja dapat mengeksplorasi peluang karir, meningkatkan keterampilan, dan membangun jaringan profesional.</p>
                    
                    <h5 class="mb-4">Apa yang Kami Tawarkan</h5>
                    <p>Ragam Peluang Karir</p>
                    <p>Kami menyajikan ribuan lowongan pekerjaan dari berbagai industri dan tingkatan pengalaman. Mulai dari entry-level hingga posisi manajerial, kami memiliki sesuatu untuk semua orang.</p>
                    <p>Proses Pencarian yang Mudah</p>
                    <p>Antarmuka pengguna intuitif kami dirancang untuk memudahkan pencari kerja menemukan pekerjaan yang sesuai. Filter canggih memungkinkan pencarian yang spesifik berdasarkan industri, lokasi, gaji, dan banyak lagi.</p>
                    <p>Riset Pekerjaan dan Industri</p>
                    <p>Kami menyediakan informasi terkini tentang tren industri, gaji rata-rata, dan saran karir untuk membantu pencari kerja membuat keputusan informasi.</p>
                    <p>Pendidikan dan Pelatihan</p>
                    <p class="mb-4">Selain membantu Anda menemukan pekerjaan yang sesuai, kami juga menawarkan sumber daya pendidikan dan pelatihan untuk membantu Anda meningkatkan keterampilan dan bersaing di pasar kerja yang kompetitif.</p>
                    
                    <h5 class="mb-4">Bergabunglah Bersama Kami</h5>
                    <p class="mb-4">Tidak peduli tahap karir Anda, JobNest menyambut Anda untuk bergabung dengan komunitas pencari kerja kami. Temukan peluang karir yang menarik, bangun profil profesional yang mencolok, dan ambil langkah pertama menuju kesuksesan karir Anda.</p>
                
                    <p>Salam sukses, <br> Tim JobNest</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->
@endsection
