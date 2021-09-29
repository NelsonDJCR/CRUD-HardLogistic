<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'lastname',
        'dni',
        'phone',
        'address',
    ];


    // Obtener Solo una columna especifica
    public static function getNames()
    {
        $registers = self::orderBy('name')->get();
        $list = [];
        foreach ($registers as $register) {
            $list[$register->id] = $register->name;
        }
        return $list;
    }

    // All records
    public static function getList()
    {
        return self::all()->where('state', 1);
    }

    public function getNameState()
    {
        switch ($this->state) {
            case '1':
                return 'Activo';
                break;
            case '0':
                return 'Inactive';
                break;
        }
    }
}
