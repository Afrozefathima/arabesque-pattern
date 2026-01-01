<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierPart extends Model
{
    protected $table = 'supplier_parts';
    protected $primaryKey = 'supplier_part_id';
    public $timestamps = true;

    protected $fillable = [
        'supplier_id',
        'part_id',
        'price',
        'condition',
        'verification_status'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id');
    }

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id', 'part_id');
    }

    public function stock()
    {
        return $this->hasOne(Stock::class, 'supplier_part_id', 'supplier_part_id');
    }
}
