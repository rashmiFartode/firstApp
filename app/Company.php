<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded=[];

	//joining to table
	//a company may have many customer
	public function customers()
	{
		return $this->hasMany(Customer::class);
	}

}