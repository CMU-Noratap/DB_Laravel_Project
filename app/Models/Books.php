<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    public $timestamps = false; 
    const CREATED_AT = 'fil_ts';
    const UPDATED_AT = 'fil_ts';

    use HasFactory;

    public $table = 'Books';
	#public $key = 'ISBN';
    protected $primaryKey = 'ISBN';

    protected $fillable = ['ISBN','AuthNo','Title','Edition','Category','Price','Publisher_id','maintain_staff_id'];
}
