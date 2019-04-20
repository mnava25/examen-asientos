<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Movimiento extends Model
{
    protected $fillable = [
        "cuenta",
        "debe",
        "haber"
    ];

    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
    ];
}
