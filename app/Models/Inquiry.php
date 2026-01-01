<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inquiry
 * 
 * @property int $inquiry_id
 * @property int $part_id
 * @property int|null $user_id
 * @property string|null $whatsapp_no
 * @property string|null $email
 * @property string|null $name
 * @property string|null $location
 * @property string|null $message
 * @property Carbon $created_at
 * 
 * @property Part $part
 * @property User|null $user
 *
 * @package App\Models
 */
class Inquiry extends Model
{
	protected $table = 'inquiries';
	protected $primaryKey = 'inquiry_id';
	public $timestamps = false;

	protected $casts = [
		'part_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'part_id',
		'user_id',
		'whatsapp_no',
		'email',
		'name',
		'location',
		'message'
	];

	public function part()
	{
		return $this->belongsTo(Part::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
