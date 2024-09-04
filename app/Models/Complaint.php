<?php

namespace App\Models;

use App\Models\ComplaintPhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(ComplaintPhoto::class);
    }

    public function quote()
    {
        return $this->hasOne(Quotation::class);
    }
}
