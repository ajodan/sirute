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
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Inventaris</h5>
                    <h1 class="mb-4">Riwayat Inventaris</h1>
                    <p class="mb-0">Berikut adalah riwayat inventaris yang telah dipinjam.
                    </p>
                    <div class="mt-4">
                    <button type="button" class="btn btn-indigo" data-bs-toggle="modal" data-bs-target="#tambahPeminjamanModal">
                        + Tambah Peminjaman Inventaris
                    </button>
                </div>
                </div>
                

                <div class="list-group">
                    @if ($peminjaman == null || $peminjaman->isEmpty())
                        <div class="list-group-item alert alert-info text-center">
                            <p class="mb-0"> Riwayat Peminjaman Inventaris Belum Tersedia.</p>
                        </div>
                    @endif

                    @foreach($peminjaman as $item)
                        <div class="list-group-item d-flex align-items-start">
                            <div class="me-3" style="width: 200px; height: 150px; overflow: hidden;">
                                <img class="img-fluid rounded" 
                                    src="{{ asset('storage/inventaris/' . $item->inventaris->image) }}" 
                                    alt="Image">
                            </div>
                            <div class="flex-fill">
                                <h5 class="mb-1">
                                    <a href="#" class="text-dark">{{ $item->inventaris->nama }}</a>
                                </h5>
                                <small class="text-muted">
                                    <i class="fa fa-calendar-alt text-primary me-2"></i>
                                    Tanggal Pinjam : {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                </small>
                                <p class="mb-2">Status : {{ $item->status }}</p>
                                <p class="mb-2">Jumlah Pinjam : {{ $item->jumlah }}</p>
                                {{-- <a href="{{ route('user.inventaris.riwayatinventaris', $item->id_peminjaman) }}" class="btn btn-hover btn-primary rounded-full"> Lihat</a>
                                <a href="{{ route('user.inventaris.pinjam', $item->id_peminjaman) }}" class="btn btn-hover btn-primary rounded-full"> Ubah</a>
                                <form action="{{ route('user.inventaris.delete', $item->id_peminjaman) }}" method="POST" onsubmit="return confirm('Yakin hapus data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-hover btn-primary rounded-full">Hapus</button>
                                </form> --}}
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-3">
                        {{ $paginator->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                </div>

            </div>
        </div>

    {{-- <x-partials.user.inventaris.pinjam /> --}}
</x-layout.user-layout>
<!-- Modal Tambah Peminjaman Modern -->
<div class="modal fade" id="tambahPeminjamanModal" tabindex="-1" aria-labelledby="tambahPeminjamanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formPinjam" action="{{ route('user.inventaris.pinjam') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPeminjamanLabel">Tambah Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_inventaris" class="form-label">Jenis Inventaris</label>
                        <select name="id_inventaris" id="id_inventaris" class="form-select select2" required>
                            <option value="">-- Pilih Jenis Inventaris --</option>
                            @foreach ($inventaris as $item)
                                <option value="{{ $item->id_inventaris }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Pinjam</label>
                        <input type="text" name="tanggal" id="tanggal" class="form-control datepicker" required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" required>
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

<!-- CSS & JS tambahan -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi Select2
    $('.select2').select2({
        dropdownParent: $('#tambahPeminjamanModal'),
        width: '100%'
    });

    // Inisialisasi Datepicker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });

    const pinjamModal = document.getElementById('tambahPeminjamanModal');
    const form = document.getElementById('formPinjam');

    // Submit form via AJAX
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
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: data.message,
                    confirmButtonColor: '#3085d6'
                });

                // Tutup modal dan reset form
                const modalInstance = bootstrap.Modal.getInstance(pinjamModal);
                modalInstance.hide();
                form.reset();
                $('.select2').val(null).trigger('change'); // Reset select2
                location.reload(); // Reload untuk update list
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: data.message,
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


