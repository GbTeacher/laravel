<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//('name')
//('phone'
//('email'
//comment'

/**
 * Class Order
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $comment
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'comment',
    ];
}
