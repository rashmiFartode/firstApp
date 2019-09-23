<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	// ================================
	// mass assignment method 1:fillable method
	// ================================
	// in $fillable array value or field are allowed to mass assignment
	// --------------------------------
	//protected $fillable=['name','email','mobile','status'];

    // ================================
	// mass assignment method 2:guarded method
	// ================================
	// in $guarded array value or field are not // allowed to mass assignment
	// exactly opposite to fillable method
	// --------------------------------
	protected $guarded=[];

	//setting some deafult value
	protected $attributes=[
		'status'=> 1
	];
	// =======================
	// scope assignment method
	// syntax: scope<ScopeMethod>
	// ========================
    public function scopeActive($query)
    {
    	return $query->where('status', 1);
    }

    public function scopeInactive($query)
    {
    	return $query->where('status', 0);
    }

    public function company()
    {
    	return $this->belongsTo(Company::class);
    }

// ========================
// accessor
// ========================
//To define an accessor, create a getStatusAttribute method on your model where Status[column of the table] is the "customers"[table] cased name of the column you wish to access. In this example, we'll define an accessor for the Satus attribute. The accessor will automatically be called by Eloquent when attempting to retrieve the value of the Satus attribute:

	public function getStatusAttribute($attribute)
	{
		return $this->activeOptions()[$attribute];
	}
	public function getNameAttribute($attribute)
	{
		return ucfirst($attribute);
	}

	public function activeOptions()
	{
		return [
			1=>'Active',
			0=>'Inactive',
			2=>'In-progress'
		];
	}
}
