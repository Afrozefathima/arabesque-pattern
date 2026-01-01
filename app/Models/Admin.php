<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Admin
 * 
 * @property int $admin_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $password_hash
 * @property string|null $role
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class Admin extends Authenticatable
{
	use HasApiTokens;
	protected $table = 'admins';
	protected $primaryKey = 'admin_id';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'email',
		'password_hash',
		'role'
	];

	 protected $hidden = [
        'password_hash', 
    ];
}
