<style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      padding: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 40px;
    }

    .org-chart {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .node {
      background: #ffffff;
      border: 2px solid #4CAF50;
      padding: 10px 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.15);
      text-align: center;
      font-weight: bold;
      min-width: 150px;
      margin: 0 auto;
      opacity: 0; /* untuk animasi */
      transform: translateY(20px); /* mulai agak turun */
      animation: fadeSlideIn 0.8s forwards;
    }

    .node small {
      display: block;
      margin-top: 4px;
      font-weight: normal;
      color: #555;
    }

    .level {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      margin: 20px 0;
      position: relative;
      flex-wrap: wrap;
    }

    /* garis vertikal ke bawah */
    .level::before {
      content: '';
      position: absolute;
      top: -20px;
      left: 50%;
      width: 2px;
      height: 20px;
      background: #4CAF50;
    }

    /* garis horizontal antar anak */
    .level:after {
      content: '';
      position: absolute;
      top: 0;
      left: 10%;
      right: 10%;
      height: 2px;
      background: #4CAF50;
    }

    .level:first-child::before,
    .level:first-child::after {
      display: none;
    }

    .level .node {
      margin: 15px 30px;
      position: relative;
    }

    /* garis vertikal dari parent ke child */
    .level .node::before {
      content: '';
      position: absolute;
      top: -20px;
      left: 50%;
      width: 2px;
      height: 20px;
      background: #4CAF50;
    }

    .level:first-child .node::before {
      display: none;
    }

    /* --- Animasi --- */
    @keyframes fadeSlideIn {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* kasih delay agar muncul bergantian */
    .level .node:nth-child(1) { animation-delay: 0.2s; }
    .level .node:nth-child(2) { animation-delay: 0.4s; }
    .level .node:nth-child(3) { animation-delay: 0.6s; }
    .level .node:nth-child(4) { animation-delay: 0.8s; }
    .level .node:nth-child(5) { animation-delay: 1s; }

    /* --- RESPONSIVE --- */
    @media (max-width: 768px) {
      .level {
        flex-direction: column;
        align-items: center;
      }

      .level:after {
        display: none;
      }

      .level .node {
        margin: 20px 0;
      }

      .level .node::before {
        left: 50%;
      }
    }
  </style>
<x-layout.user-layout>
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Struktur Organisasi</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Struktur Organisasi</a></li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                    <h5 class="section-title px-3">Struktur Organisasi</h5>
                    <h1 class="mb-4">Struktur Organisasi RW 13</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="org-chart">
                            <!-- Level 1 -->
                            <div class="level">
                                <div class="node">
                                    Ketua RW <br>
                                    <small>H. Supriyono</small>
                                </div>
                            </div>

                            <!-- Level 2 -->
                            <div class="level">
                                <div class="node">
                                    Wakil Ketua <br>
                                    <small>Franto Efendi Sijabat</small>
                                </div>
                                <div class="node">
                                    Sekretaris <br>
                                    <small>Muhanto</small>
                                </div>
                                <div class="node">
                                    Bendahara <br>
                                    <small>Subur</small>
                                </div>
                            </div>

                            <!-- Level 3 -->
                            <div class="level">
                                <div class="node">
                                    Bidang Keamanan <br>
                                    <small>Karolus Kou</small>
                                </div>
                                <div class="node">
                                    Bidang Lingkungan <br>
                                    <small>Sukrisno</small>
                                </div>
                                <div class="node">
                                    Bidang Olahraga <br>
                                    <small>Bintang</small>
                                </div>
                                <div class="node">
                                    Bidang Humas <br>
                                    <small>Ahmad Pandis</small>
                                </div>
                                <div class="node">
                                    Bidang Teknologi Informasi <br>
                                    <small>Warkim</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Blog End -->
</x-layout.user-layout>