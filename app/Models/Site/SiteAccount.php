<?php

namespace App\Models\Site;

use App\Services\Attendance\Contracts\SiteAccountContract;
use Illuminate\Database\Eloquent\Model;

class SiteAccount extends Model implements SiteAccountContract
{
    protected $table = 'site_accounts';
    protected $guarded = [];

    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SiteType::class, 'site_type_code', 'code');
    }

    public function getTypeKey(): string
    {
        return $this->type->getKey();
    }

    public function getAccount(): string
    {
        return $this->account_id;
    }

    public function getPassword(): string
    {
        return $this->account_password;
    }
}