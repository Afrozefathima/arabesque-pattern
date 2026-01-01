<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $user_id
 * @property string $name
 * @property string|null $email
 * @property string|null $whatsapp_no
 * @property string|null $location
 * @property Carbon $created_at
 * 
 * @property Collection|Inquiry[] $inquiries
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'user_id';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'email',
		'whatsapp_no',
		'location'
	];

	public function inquiries()
	{
		return $this->hasMany(Inquiry::class);
	}
}
