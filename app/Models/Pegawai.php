<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Relations\HasMany;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable=['user_id','nama','nip','nik','tmt','usia','masakerja','jabatan_id','golongan_id','agama_id','jeniskelamin_id','ttl','alamat'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function golongan():BelongsTo
    {
        return $this->belongsTo(Golongan::class);
    }
    public function jabatan():BelongsTo
    {
        return $this->belongsTo(Jabatan::class);
    }
    public function agama():BelongsTo
    {
        return $this->belongsTo(Agama::class);
    }
    public function jeniskelamin():BelongsTo
    {
        return $this->belongsTo(Jeniskelamin::class);
    }
    
}
