<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'price'];

    public $timestamps = false; // se você não tiver created_at/updated_at padrão
}
