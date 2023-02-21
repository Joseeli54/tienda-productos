<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Actividad extends Model
{
    //definiendo que tabla se refierfe este modelo
    protected $table = 'actividad';
    //definiendo el nombre del codigo de este modelo
    protected $primaryKey = "id";
    //como la clave primaria es alfanumerica se debe coloar para que llene bien la N a N
    public $incrementing = true;

}
