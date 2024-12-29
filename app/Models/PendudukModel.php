<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PendudukModel extends Model
{
    use HasFactory;
    protected $table = 'tb_penduduk';
    protected $primaryKey = 'nik';
    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'status_perkawinan',
        'hub_kk',
        'pekerjaan',
        'pendidikan',
        'gol_darah',
        'no_kk',
        'status_penduduk',
        'no_hp',
        'email',
        'status_dasar',
        'id_alamat',
        'image'
    ];

    protected $casts = [
        'ttl' => 'datetime',
    ];

    public function akun(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AkunModel::class, 'nik', 'nik');
    }

    public function alamat(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AlamatModel::class, 'id_alamat', 'id_alamat');
    }

    public function age()
    {
        return Carbon::parse($this->attributes['tgl_lahir'])->age;
    }

    public function kk()
    {
        return $this->belongsTo(KkModel::class, 'no_kk', 'no_kk');
    }

    public function foto_profile()
    {
        // return asset('storage/images/penduduk/' . $this->image);
        // check if image is null or image exists
        if ($this->image == null || !file_exists(public_path('storage/images/penduduk/' . $this->image))) {
            return asset('assets/images/illustration/image-not-found.svg');
        } else {
            return asset('storage/images/penduduk/' . $this->image);
        }
    }

    public function berita()
    {
        return $this->hasMany(BeritaModel::class, 'author', 'nik');
    }

    public function keuangan()
    {
        return $this->hasMany(KeuanganModel::class, 'nik', 'nik');
    }

    public function alamatLengkap(): string
    {
        return $this->alamat->jalan . ' RT' . $this->alamat->rt . ' RW' . $this->alamat->rw . ' Kelurahan ' . $this->alamat->kel . ' Kecamatan ' . $this->alamat->kecamatan;
    }

    public function alamatRumah(): string
    {
        return ' ' . $this->alamat->norumah;
    }

    public function isPenerimaBansos()
    {
        $bansos = BansosModel::where('no_kk', $this->no_kk)->whereIn('status', ['approved', 'done'])->first();
        return $bansos != null;
    }

    public function maps()
    {
        return $this->hasOne(MapsModel::class, 'nik', 'nik');
    }
}
