<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ourCompanySettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'firma',
        'adres',
        'kodpocztowy',
        'miasto',
        'nip',
    ];
}
