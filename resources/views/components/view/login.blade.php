<x-layout.form-login-layout>
    <div class="sm:grid grid-cols-2 h-screen">
        <div class="hidden sm:flex justify-center items-center bg-transparent col-span-1">
            <div class="absolute z-[-1] h-screen w-screen bg-green-400" id="particles-js"></div>
            <div class="text-center pr-20 pl-20 ">
                <h2 class="text-5xl font-extrabold font-sans text-white mb-5 uppercase">LAYANAN MANDIRI<span
                        class="text-indigo-700">  SIRUTE</span>
                </h2>
                <p class="text-white text-lg mb-7">Warga dapat membuat Permohonan Surat Keterangan, UMKM, Peminjaman Inventaris dan Aspirasi/Pengaduan melalui Website RW.
                    Silakan hubungi Admin untuk pengaktifan dan mendapatkan kode PIN. <br>Untuk mendapatkan akses ke layanan. Silakan klik <a href="https://wa.me/6281314408686" target="_blank" class="btn btn-success"><b>Hubungi Admin</b></a></p>
                <a href="{{ route('user.home') }}">
                    <button type="button"
                        class="text-white hover:text-indigo-700 hover:bg-white bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-white font-medium text-base px-8 py-2.5 text-center me-2 mb-2 ">
                        Halaman Website</button>
                </a>
            </div>
        </div>
        <div class="sm:py-0 py-20 flex justify-center items-center bg-white col-span-1" x-data="{ page: 'penduduk' }">
            <form class="w-full sm:pl-20 sm:pr-24 sm:px-0 px-10" action="{{ route('auth') }}" method="POST">
                @csrf
                <h1 class="text-3xl font-sans font-medium text-purple-500 mb-2">LOGIN LAYANAN MANDIRI</h1>
                {{-- <h3 class="text-2xl font-sans font-normal capitalize mb-8">Masuk ke akun anda</h3> --}}

                <div class="mb-5">
                    <label for="username" class="block mb-2 text-lgfont-medium text-green-900 dark:text-white">
                        Username</label>
                    <input type="text" id="username"
                        class="shadow-sm bg-white border border-green-300 text-gray-900 text-sm  focus:ring-ungu focus:border-ungu block w-full py-3 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="NIK" required name="username" />
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-lgfont-medium text-green-900 dark:text-white">
                        Password</label>
                    <input type="password" id="password"
                        class="shadow-sm bg-white border border-green-300 text-green-900 text-sm  focus:ring-ungu focus:border-ungu block w-full py-3 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Password" name="password" required />
                </div>
                <div class="flex items-center mb-5 mt-4">
                    
                    <label for="terms" class="ms-2 text-base font-medium  text-green-900 dark:text-gray-300">
                    <p class="text-black text-lg mb-5">Silakan <a href="https://wa.me/6281314408686" target="_blank" class="btn btn-success"><b>Hubungi Admin</b></a><br> untuk pengaktifan dan mendapatkan kode password.</p>
                </label>
                </div>
                @error('message')
                    <div class="text-red-500 text-sm mb-5">{{ $message }}</div>
                @enderror
                <input type="hidden" name="page" :value="page">
                <button type="submit"
                    class="bg-purple-400 hover:bg-indigo-700 text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-lg px-5 py-4 w-full text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masuk</button>
            </form>
           
             


            {{-- opsi akses --}}
           

        <script src="{{ asset('assets/js/particles.min.js') }}"></script>
        <script>
            particlesJS("particles-js", {
                "particles": {
                    "number": {
                        "value": 380,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#edebfe"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#6c2bd9"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 100,
                            "height": 100
                        }
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#6c2bd9",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "grab"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 140,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            });
        </script>
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.directive('log', (el, {
                    expression
                }, {
                    evaluateLater,
                    effect
                }) => {
                    let getThingToLog = evaluateLater(expression)

                    effect(() => {
                        getThingToLog(thingToLog => {
                            console.log(thingToLog)
                        })
                    })
                })
            })
        </script>
</x-layout.form-login-layout>
