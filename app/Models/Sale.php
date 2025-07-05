<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory,SoftDeletes;
    // use SoftDeletes;
    protected $fillable = [
    'user_id',
    'sale_date',
    'total',
];

    protected $appends = ['formatted_total'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $this->hasMany(SaleItem::class);
    }

    public function notes() {
        return $this->morphMany(Note::class, 'notable');
    }

    public function getFormattedTotalAttribute() {
        return number_format($this->total, 2) . ' BDT';
    }

}
