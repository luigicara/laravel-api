<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Genre;
use App\Models\Tag;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'cashout',
    ];

    public function genre() {

        return $this -> belongsTo(Genre::class);
    }

    public function tags() {
        return $this -> belongsToMany(Tag::class);
    }
}
