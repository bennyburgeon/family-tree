<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCategory extends Model
{
    use HasFactory;
    protected $table = 'customer_category';

    protected $primaryKey = 'customer_category_id';
  
    protected $fillable = [
      'category_name'
    ];


    public function customers()
    {
      return $this->hasMany(Customer::class,'customer_category_id','customer_category_id');
    }
}
