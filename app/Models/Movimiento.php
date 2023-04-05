<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Movimiento extends Model
{
    //definiendo que tabla se refierfe este modelo
    protected $table = 'movimiento';
    //definiendo el nombre del codigo de este modelo
    protected $primaryKey = ['id_almacen', 'id_producto'];
    //como la clave primaria es alfanumerica se debe coloar para que llene bien la N a N
    public $incrementing = false;

    //Disable at_update and at_create
    public $timestamps = true;
}
