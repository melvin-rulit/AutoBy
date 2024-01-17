<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/** @property int $role_id
 * @property mixed enabled
 * @property int branch_id
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ROLE_ADMIN = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'email',
        'password',
        'role_id',
        'enabled',
        'branch_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday'          => 'date',
        'enabled'           => 'boolean'
    ];

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function isAdmin(): bool
    {
        return $this->role_id === self::ROLE_ADMIN;
    }

    public function getBranchId(): ?int
    {
        return $this->branch_id;
    }


}
