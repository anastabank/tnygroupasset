<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class Department extends Model
{
    use HasFactory;
    use HasRoleAndPermission;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'department';


    public $timestamps = true;


    protected $guarded = [
        'id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected $fillable = [
        'dname',
    ];

    protected $casts = [
        'dname'     => 'string',
    ];


    public function Profile()
    {
        return $this->hasOneThrough(\App\Models\Profile::class, \App\Models\User::class);
    }
}
