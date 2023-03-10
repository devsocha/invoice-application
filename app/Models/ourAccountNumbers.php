<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ourAccountNumbers extends Model
{
    use HasFactory;
    protected $fillable = [
        'nazwa',
        'numerkonta',
    ];
    public function invoice()
    {
        return $this->belongsTo(invoice::class,'idKonta');
    }
}
