<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Category extends Model
{
    use HasFactory;
    
    protected $casts = [
        'is_hidden' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'is_hidden',
        'description',
        'author',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
