<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Supplier
 * 
 * @property int $supplier_id
 * @property string $company_name
 * @property string|null $contact_person
 * @property string $email
 * @property string|null $phone
 * @property string $password_hash
 * @property string|null $location
 * @property string|null $status
 * @property Carbon $created_at
 * 
 * @property Collection|Blog[] $blogs
 *
 * @package App\Models
 */
class Supplier extends Authenticatable

{
	use Notifiable, HasApiTokens;
	protected $table = 'suppliers';
	protected $primaryKey = 'supplier_id';
	public $timestamps = true;

	protected $fillable = [
		'company_name',
		'contact_person',
		'email',
		'phone',
		'password_hash',
		'location',
		'status'
	];

	protected $hidden = [
        'password_hash',
    ];

	public function blogs()
	{
		return $this->hasMany(Blog::class, 'author_id');
	}
	public function supplierParts()
{
    return $this->hasMany(SupplierPart::class, 'supplier_id', 'supplier_id');
}
}
