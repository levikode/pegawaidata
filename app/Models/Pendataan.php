<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendataan extends Model
{
    use HasFactory;

    // Daftar atribut yang bisa diisi secara massal
    protected $fillable = [
        'user_id', 
        'nama', 
        'nip', 
        'nik', 
        'tmt', 
        'usia', 
        'masakerja', 
        'ttl', 
        'alamat', 
        'jeniskelamin', 
        'jabatan', 
        'golongan', 
        'pendidikan', 
        'agama', 
        'notlp', 
        'riwayat_golongan'
    ];

    /**
     * Relasi ke model User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Cast kolom riwayat_golongan menjadi array
     */
    protected $casts = [
        'riwayat_golongan' => 'array', // Memastikan kolom JSON otomatis diubah ke array
    ];

    /**
     * Tambahkan riwayat golongan baru
     *
     * @param string $golongan
     * @return void
     */
    public function tambahRiwayatGolongan(string $golongan): void
    {
        // Ambil riwayat golongan yang ada
        $riwayat_golongan = $this->riwayat_golongan ?? [];

        // Tandai akhir golongan lama (jika ada)
        if (!empty($riwayat_golongan)) {
            $riwayat_golongan[count($riwayat_golongan) - 1]['tanggal_akhir'] = now()->toDateString();
        }

        // Tambahkan golongan baru
        $riwayat_golongan[] = [
            'golongan' => $golongan,
            'tanggal_mulai' => now()->toDateString(),
            'tanggal_akhir' => null, // Golongan baru menjadi aktif
        ];

        // Simpan riwayat golongan ke kolom database
        $this->riwayat_golongan = $riwayat_golongan;
        $this->save();
    }
}
