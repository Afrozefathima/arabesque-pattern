<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
    protected $primaryKey = 'stock_id';
    public $timestamps = true;

    protected $fillable = [
        'supplier_part_id',
        'stock_quantity',
        'on_order',
        'sold',
    ];

    // Relationship to SupplierPart
    public function supplierPart()
    {
        return $this->belongsTo(SupplierPart::class, 'supplier_part_id', 'supplier_part_id');
    }

    // Shortcut to get Part via SupplierPart
    public function part()
    {
        return $this->hasOneThrough(
            Part::class,
            SupplierPart::class,
            'supplier_part_id', // FK on supplier_parts table
            'part_id',          // FK on parts table
            'supplier_part_id', // Local key on stock table
            'part_id'           // Local key on supplier_parts table
        );
    }

    // Shortcut to get Supplier via SupplierPart
    public function supplier()
    {
        return $this->hasOneThrough(
            Supplier::class,
            SupplierPart::class,
            'supplier_part_id', // FK on supplier_parts table
            'supplier_id',      // FK on suppliers table
            'supplier_part_id', // Local key on stock table
            'supplier_id'       // Local key on supplier_parts table
        );
    }
}
