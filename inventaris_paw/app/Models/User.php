<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * kolom yang diizinkan untuk diisi sekaligus melalui input.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * kolom yang tidak ikut ditampilkan saat data diubah ke bentuk JSON atau array.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * kolom yang tipe datanya otomatis diubah oleh Laravel.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * RELASI:
     * Satu user dapat menambahkan banyak barang
     */
    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
