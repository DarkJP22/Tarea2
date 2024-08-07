<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genero;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'year', 'studio', 'genere_id', 'genere_id'];

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    public static function getMoviesByGenero($generoName)
    {
        return self::whereHas('genero', function($query) use ($generoName) {
            $query->where('name', $generoName);
        })->get();
    }
}
