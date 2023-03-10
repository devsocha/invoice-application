<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    protected $fillable =[
        'nazwa',
        'idFirmy',
        'idKonta',
        'czas',
        'osoba',
        'status',
        'product',
        'kwotanetto',
        'procentvat',
        'ile',
        'kwotabrutto',
        'rok',
    ];

    //todo dodanie relacji dla numeru konta i dla firmy
    public function company()
    {
        return $this->hasOne(company::class,'id','idFirmy');
    }
    public function ourAccountNumbers()
    {
        return $this->hasOne(ourAccountNumbers::class,'id','idKonta');
    }
}
