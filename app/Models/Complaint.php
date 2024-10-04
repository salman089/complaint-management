<?php

namespace App\Models;

use App\Models\ComplaintPhoto;
use App\Models\CompletionImage;
use App\Models\ComplaintAssignee;
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

    public function assignees()
    {
        return $this->hasMany(ComplaintAssignee::class);
    }

    public function completionImages()
    {
        return $this->hasMany(CompletionImage::class);
    }
}
