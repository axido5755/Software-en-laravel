<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contenido_anexo extends Model
{
    protected $primaryKey = ['id_anexo', 'id_contrato'];
    public $incrementing = false;
}
