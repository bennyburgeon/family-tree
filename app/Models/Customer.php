<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'customers';

    protected $primaryKey = 'customer_id';
  
    protected $fillable = [
      'firstname',
      'lastname',
      'email',
      'mobile',
      'image',
      'username',
      'password',
      'dob',
      'gender',
      'address',
      'created_by_admin',
      'status'
    ];

    public function category()
    {
      return $this->hasOne(CustomerCategory::class,'customer_category_id','customer_category_id');
    }

}
