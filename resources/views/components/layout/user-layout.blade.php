<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>SiRuTe - RW 13 Taman Alamanda</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <style>
    .excerpt-berita {
            text-align: justify;
            line-height: 1.6;
            font-size: 15px;
            color: #555;
    }
    .konten-berita p {
        margin-bottom: 0.5rem;
        color: #333;
        line-height: 1.7;
        font-size: 1rem;
        text-align: justify;
    }
     .gambar-berita {
        width: 100%;
        height: 400px; /* default untuk desktop */
        object-fit: cover;
        object-position: center;
        border-radius: 8px;
    }

    /* Untuk tablet & HP */
    @media (max-width: 768px) {
        .gambar-berita {
            height: 250px; /* lebih pendek supaya pas di layar kecil */
        }
    }
    .thumbnail-berita {
        width: 100%;
        height: 100px;
        object-fit: cover;
        object-position: center;
        border-radius: 8px;
        margin-bottom: 5px;
        font-size: 10px;
    }
</style>
    
    <body>

        <!-- Topbar End -->
        <div class="mb-20">
        <x-partials.user.nav />
        </div>
        {{ $slot }}
        <x-partials.user.footer />  
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>


        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}"></script>       
        <script>
            document.getElementById('aspirasiForm').addEventListener('submit', function(e) {
                let aspirasi = document.getElementById('aspirasi').value.trim();

                if (aspirasi.length < 10) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Aspirasi minimal 10 karakter.',
                        confirmButtonColor: '#3085d6'
                    });
                } else if (aspirasi.length > 255) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Aspirasi maksimal 500 karakter.',
                        confirmButtonColor: '#3085d6'
                    });
                }
            });
        </script>         
    </body>
</html>