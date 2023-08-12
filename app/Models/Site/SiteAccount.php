<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class SiteAccount extends Model
{
    protected $table = 'site_accounts';
    protected $guarded = [];

    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SiteType::class, 'site_type_code', 'code');
    }

}