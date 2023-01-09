<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projet extends Model
{
    use HasFactory;

    protected $table = 'projet';
    protected $fillable = [
        'nom', 'Description','date_debut','date_fin'
    ];
    public function phase()
        {
            return $this->hasMany(phase::class);
        }
}
