<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_item_id',
        'business_id',
    ];

    public function categoryItem()
    {
        return $this->belongsTo(CategoryItem::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
