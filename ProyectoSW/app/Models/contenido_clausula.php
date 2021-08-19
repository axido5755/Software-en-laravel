<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contenido_clausula extends Model
{
    protected $primaryKey = ['id_clausula', 'id_contrato'];
    public $incrementing = false;
}
