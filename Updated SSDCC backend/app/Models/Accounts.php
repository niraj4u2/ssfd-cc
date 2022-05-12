<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Accounts extends Model
{
	    protected $primaryKey = 'accounts_id';

   // use HasFactory;
    protected $fillable = ['accounts_id','name', 'account_num','account_pin','profile_img','card_block_data','updated_at','created_at','card_status'];
}
