<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Url extends Model
{
    use HasFactory;
    protected $fillable = ['url','short_url','visit','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
