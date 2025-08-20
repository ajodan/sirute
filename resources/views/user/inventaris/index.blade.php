<x-layout.user-layout>
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Inventaris</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Inventaris</a></li>
                </ol>    
            </div>
        </div>
    <!-- Explore Tour Start -->
        <div class="container-fluid ExploreTour py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Inventaris RW dan RT</h5>
                    <h1 class="mb-4">Daftar Inventaris</h1>
                    <p class="mb-0">Berikut adalah daftar inventaris yang tersedia di RW 13 dan RT Blok C Taman Alamanda</p>
                </div>
                <div class="tab-class text-center">
                    <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                        @if(auth()->user()->penduduk->alamat->rt == '01')
                        <li class="nav-item">
                            <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#InternationalTab-2">
                                <span class="text-dark" style="width: 100px;">RT 01</span>
                            </a>
                        </li>
                        @elseif(auth()->user()->penduduk->alamat->rt == '02')
                         <li class="nav-item">
                            <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#InternationalTab-2">
                                <span class="text-dark" style="width: 100px;">RT 02</span>
                            </a>
                        </li>
                        @elseif(auth()->user()->penduduk->alamat->rt == '03')
                         <li class="nav-item">
                            <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#InternationalTab-2">
                                <span class="text-dark" style="width: 100px;">RT 03</span>
                            </a>
                        </li>
                        @elseif(auth()->user()->penduduk->alamat->rt == '04')
                         <li class="nav-item">
                            <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#InternationalTab-2">
                                <span class="text-dark" style="width: 100px;">RT 04</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                    <div class="container my-3">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-triangle me-2"></i> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                            </div>
                        @endif
                    </div>

                    <div class="tab-content">
                        <div id="InternationalTab-2" class="tab-pane fade show p-0 active">
                            <div class="InternationalTour-carousel owl-carousel">
                                @foreach ($inventaris as $item)
                                <div class="international-item">
                                    {{-- Bungkus gambar dengan container fix size --}}
                                    <div style="width:100%; height:250px; overflow:hidden; border-radius: 10px;">
                                        <img src="{{ asset('storage/inventaris/' . $item->image) }}" 
                                            class="img-fluid w-100 h-100" 
                                            style="object-fit: cover;" 
                                            alt="Image">
                                    </div>
                                    <div class="international-content">
                                        <div class="international-info">
                                            <h5 class="text-white text-uppercase mb-2">{{ $item->nama }}</h5>
                                            <a href="#" class="btn-hover text-white">
                                                <i class="fa fa-eye ms-2"></i> 
                                                <span>Jumlah {{ $item->jumlah }} Unit</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tour-offer bg-success">Inventaris RT 0{{ $item->rt }}</div>
                                    <div class="international-plus-icon">
                                        <!-- Tombol Pinjam buka modal -->
                                        <a href="#" 
                                        class="my-auto" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#pinjamModal" 
                                        data-id="{{ $item->id_inventaris }}" 
                                        data-nama="{{ $item->nama }}">
                                            <i class="fas fa-link fa-2x text-white"></i> Pinjam
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{-- <x-partials.user.inventaris.pinjam /> --}}
</x-layout.user-layout>
<!-- Modal Form Pinjam -->
<!-- Modal Form Pinjam -->
<div class="modal fade" id="pinjamModal" tabindex="-1" aria-labelledby="pinjamModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('user.inventaris.pinjam') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="pinjamModalLabel">Form Peminjaman Inventaris</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_inventaris" id="inventaris_id">
          <div class="mb-3">
            <label for="nama_barang" class="form-label">Barang</label>
            <input type="text" class="form-control" id="nama_barang" readonly>
          </div>
          <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Pinjam</label>
            <input type="number" class="form-control" name="jumlah" min="1" required>
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" name="tanggal" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Pinjam</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var pinjamModal = document.getElementById('pinjamModal');

    // Saat modal dibuka → isi field
    pinjamModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var nama = button.getAttribute('data-nama');

        document.getElementById('inventaris_id').value = id;
        document.getElementById('nama_barang').value = nama;
    });

    // Submit form via AJAX
    var form = document.getElementById('formPinjam');
    
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(form);

        fetch(form.action, {
            method: "POST",
            headers: { 
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value 
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: data.message, // <- Pesan dari backend
                    confirmButtonColor: '#3085d6'
                });

                // Tutup modal
                let modal = bootstrap.Modal.getInstance(pinjamModal);
                modal.hide();
                form.reset();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: data.message, // <- Pesan error dari backend
                    confirmButtonColor: '#d33'
                });
            }
        })
        .catch(err => {
            console.error(err);
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Terjadi kesalahan, coba lagi.',
            });
        });
    });
});
</script>


