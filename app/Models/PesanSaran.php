<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesanSaran extends Model
{
    protected $table = 'pesan_saran';
    protected $fillable = ['user_id', 'pesan', 'feedback', 'dibalas_pada'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     protected $casts = [
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
        'dibalas_pada' => 'datetime',
    ];

    public function masihTampil()
    {
        if ($this->feedback && $this->dibalas_pada) {
            return $this->dibalas_pada->diffInHours(now()) < 24;
        }

        return true;
    }

}
