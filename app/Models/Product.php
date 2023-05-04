<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public static function findOrFail($id, $columns = ['*'])
    {
        $instance = static::find($id, $columns);

        if (! $instance) {
            throw (new ModelNotFoundException)->setModel(get_called_class());
        }

        return $instance;
    }
}
