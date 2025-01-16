<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Response;

class Pawnshop extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'age',
        'phone_number',
        'nik',
        'item',
        'item_photo',
    ];

    public function response()
    {
        return $this->hasOne(Response::class);
    }
}
