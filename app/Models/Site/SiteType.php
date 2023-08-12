<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class SiteType extends Model
{
    protected $keyType = 'string';
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $table = 'site_types';

}