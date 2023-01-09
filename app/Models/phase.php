<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phase extends Model
{
    use HasFactory;

    protected $table = 'phase';
    protected $fillable = [
        'nom', 'duree','priorite','id'
    ];
    public function projet()
        {
            return $this->belongsTo(projet::class);
        }
}
