<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Blog
 * 
 * @property int $blog_id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property int|null $author_id
 * @property string|null $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Supplier|null $supplier
 *
 * @package App\Models
 */
class Blog extends Model
{
	protected $table = 'blogs';
	protected $primaryKey = 'blog_id';

	protected $casts = [
		'author_id' => 'int'
	];

	protected $fillable = [
		'title',
		'slug',
		'content',
		'author_id',
		'status'
	];

	public function supplier()
	{
		return $this->belongsTo(Supplier::class, 'author_id');
	}
}
