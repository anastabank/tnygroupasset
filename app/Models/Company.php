<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class Company extends Model
{
    use HasFactory;
    use HasRoleAndPermission;
    use Notifiable;
    use SoftDeletes;


    protected $table = 'company';


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
        'cname',
    ];

    protected $casts = [
        'cname'     => 'string',
    ];

    public function Profile()
    {
        return $this->hasOneThrough(\App\Models\Profile::class, \App\Models\User::class);
    }
}
