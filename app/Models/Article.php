<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Relation;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'title',
      'text'
    ];

    /**
     * @return HasOne
     */
    public function user(): Relation
    {
        return $this->hasOne(Article::class,'user_id', 'id');
    }
}
