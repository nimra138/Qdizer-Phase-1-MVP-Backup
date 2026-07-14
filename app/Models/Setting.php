<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Setting extends Model
{


protected $fillable = [

'company_name',
'company_logo',
'company_email',
'company_phone',
'company_address',
'currency',
'currency_symbol'

];


}