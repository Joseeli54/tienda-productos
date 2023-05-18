<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //definiendo que tabla se refierfe este modelo
    protected $table = 'roles';
    //definiendo el nombre del codigo de este modelo
    protected $primaryKey = "id";
    //como la clave primaria es alfanumerica se debe coloar para que llene bien la N a N
    public $incrementing = false;

    //definiendo los atributos actualizables
    protected $fillable = ['id','tipo','nombre','descripcion'];
}
