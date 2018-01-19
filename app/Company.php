<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    
    protected $fillable = ['title', 'firstname', 'lastname', 'job_title', 'city', 'industry', 'email', 'linkedin', 'nome_planilha', 'hardbounce'];
}
