<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pawnshop;

class Response extends Model
{
    use HasFactory;
    protected $fillable = [
        'pawnshop_id',
        'type',
    ];

    public function pawnshop()
    {
        return $this->belongsTo(Pawnshop::class);
    }
}
