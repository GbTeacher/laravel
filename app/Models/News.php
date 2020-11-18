<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'photo',
        'short_text',
        'full_text',
        'category_id',
        'source_id',
        'source_guid',
        'link',
    ];

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
