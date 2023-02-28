<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $fillable =[
        'firma',
        'adres',
        'kodpocztowy',
        'miasto',
        'nip'
    ];
    public function invoice(){
        return $this->belongsTo(invoice::class,'idFirmy');
    }
}
