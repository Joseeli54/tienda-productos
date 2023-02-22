<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Person extends Authenticatable
{
    //definiendo que tabla se refierfe este modelo
    protected $table = 'persona';
    //definiendo el nombre del codigo de este modelo
    protected $primaryKey = "id";
    //como la clave primaria es alfanumerica se debe coloar para que llene bien la N a N
    public $incrementing = true;

    protected $fillable = [
         'nombre',
         'apellido',
         'correo',
         'username',
         'password',
         'doc_persona',
         'fec_nac',
         'telefono'
    ];

    protected $hidden = [
        'password',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getAllPersons()
    {
        return Person::all();
    }

    public function getPersonByUsername($id){
        return Alumno::where('username' , '=' , $id)->get();
    }
}
