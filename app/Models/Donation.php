<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $table = 'donations';
    protected $fillable = [
        'invoice_to' ,
        'email', 
        'phone', 
        'address', 
        'note', 
        'amount',
    ];
}
