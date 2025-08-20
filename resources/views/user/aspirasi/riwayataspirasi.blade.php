<x-layout.user-layout>
    <div class="container-fluid blog py-5">
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Riwayat Aspirasi</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                    <li class="breadcrumb-item active">Riwayat Aspirasi</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Riwayat Aspirasi</h5>
                <h1 class="mb-4">Riwayat Aspirasi</h1>
                <p class="mb-0">Berikut adalah riwayat aspirasi yang telah diajukan.</p>
                <div class="mt-4">
                    <button type="button" class="btn btn-indigo" data-bs-toggle="modal" data-bs-target="#tambahAspirasiModal">
                        + Tambah Aspirasi
                    </button>
                </div>
            </div>

            @if ($aspirasi == null || $aspirasi->isEmpty())
                <div class="alert alert-info text-center">
                    Riwayat Aspirasi Belum Tersedia.
                </div>
            @else
                <style>
                    .blog-item {
                        transition: all 0.3s ease;
                    }
                    .blog-item:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
                        border-color: #061732; /* jadi biru saat hover */
                    }
                    .color-text {
                        color: rgb(8, 20, 101);
                    }
                </style>

                <div class="row g-4 justify-content-center">
                    @foreach($aspirasi as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item bg-white border border-secondary rounded shadow-sm p-3">
                            <div class="blog-img">
                                
                                <div class="blog-img-inner text-center" style="height: 200px; overflow: hidden;">
                                    <p>Isi Pesan : <br><b>{{ Str::limit($item->isi, 255) }}</b></p>
                                    @if($item->status == 'pending')
                                    <div class="badge bg-danger text-white">Belum Direspon</div>
                                    @elseif($item->status == 'done')
                                    <p>Isi Respon : <br><b>{{ $item->respon }}</b></p>
                                @endif
                                </div>
                                
                                <div class="blog-info d-flex align-items-center border-top mt-2 pt-2">
                                    <small class="flex-fill text-left py-2">
                                        <i class="fa fa-user-alt text-primary me-2"></i>
                                        <span class="color-text">Pengirim : {{ $item->penduduk->nama }}</span>
                                        &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-calendar-alt text-primary me-2"></i>
                                        <span class="color-text">{{ $item->created_at->format('d M Y') }}</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


                {{-- <div class="mt-3">
                    {{ $aspirasi->links('pagination::bootstrap-5') }}
                </div> --}}
            @endif
        </div>
    </div>
</x-layout.user-layout>

<!-- Modal Tambah Aspirasi -->
<div class="modal fade" id="tambahAspirasiModal" tabindex="-1" aria-labelledby="tambahAspirasiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formTambahAspirasi" action="{{ route('user.aspirasi.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahAspirasiLabel">Tambah Aspirasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Aspirasi</label>
                        <textarea name="isi" id="isi" class="form-control" rows="5" required></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tambahModal = document.getElementById('tambahAspirasiModal');
    const form = document.getElementById('formTambahAspirasi');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch(form.action, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: data.message,
                    confirmButtonColor: '#3085d6'
                });

                // Tutup modal dan reset form
                const modalInstance = bootstrap.Modal.getInstance(tambahModal);
                modalInstance.hide();
                form.reset();

                // Reload halaman agar list aspirasi terbaru tampil
                location.reload();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: data.message,
                    confirmButtonColor: '#d33'
                });
            }
        })
        .catch(error => {
            console.error(error);
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Terjadi kesalahan, coba lagi.',
            });
        });
    });
});
</script>

