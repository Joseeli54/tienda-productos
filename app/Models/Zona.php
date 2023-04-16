<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Zona extends Model
{
    //definiendo que tabla se refierfe este modelo
    protected $table = 'zona';
    //definiendo el nombre del codigo de este modelo
    protected $primaryKey = "id";
    //como la clave primaria es alfanumerica se debe coloar para que llene bien la N a N
    public $incrementing = true;

    //Disable at_update and at_create
    public $timestamps = false;
}
