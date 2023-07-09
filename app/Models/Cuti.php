<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function createdByUser() {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function reviewByUser() {
        return $this->belongsTo(User::class, 'review_by');
    }
}
