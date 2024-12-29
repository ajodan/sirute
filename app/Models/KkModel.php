<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class KkModel extends Model
{
    use HasFactory;
    protected $table = 'tb_kk';
    protected $primaryKey = 'no_kk';
    protected $fillable = [
        'no_kk',
        'nik_kepalakeluarga',
    ];

    public function penduduk()
    {
        return $this->hasMany(PendudukModel::class, 'no_kk', 'no_kk');
    }

    public function pendudukHasOne()
    {
        return $this->hasOne(PendudukModel::class, 'nik', 'nik_kepalakeluarga');
    }

    public function bansos()
    {
        return $this->hasMany(BansosModel::class, 'no_kk', 'no_kk');
    }

    public function keuangan()
    {
        return $this->hasMany(KeuanganModel::class, 'no_kk', 'no_kk');
    }

    public function kepalaKeluarga()
    {
        return $this->hasOne(PendudukModel::class, 'nik', 'nik_kepalakeluarga');
    }

    public function akunKepalaKeluarga()
    {
        return $this->hasOne(AkunModel::class, 'nik', 'nik_kepalakeluarga');
    }

    public function foto_rumah()
    {
        return $this->hasMany(FotoRumah::class, 'no_kk', 'no_kk');
    }
}
