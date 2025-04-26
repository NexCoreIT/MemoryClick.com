<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = 'packages';


    public function scopeActive($q)
    {
        return $q->where('status', '1');
    }

    public function category()
    {
        return $this->belongsTo(PackageCategory::class, 'category_id');
    }

    public function features()
    {
        return $this->hasMany(PackageFeature::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
