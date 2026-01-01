<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Part
 * 
 * @property int $part_id
 * @property string $make
 * @property string $model
 * @property string|null $year_range
 * @property string $part_name
 * @property string|null $part_number
 * @property string|null $category
 * @property string|null $subcategory
 * @property string|null $description
 * @property Carbon $created_at
 * 
 * @property Collection|Inquiry[] $inquiries
 *
 * @package App\Models
 */
class Part extends Model
{
	protected $table = 'parts';
	protected $primaryKey = 'part_id';
	public $timestamps = false;

	protected $fillable = [
		'make',
		'model',
		'year_range',
		'part_name',
		'part_number',
		'category',
		'subcategory',
		'description'
	];

	public function inquiries()
	{
		return $this->hasMany(Inquiry::class);
	}
}
