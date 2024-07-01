<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\Product;

class Sale extends Model
{
    use HasFactory;
    protected $table='sales';
    protected $fillable=['supplier','date','description','qty'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }  
}
