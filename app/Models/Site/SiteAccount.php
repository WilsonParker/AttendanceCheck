<?php

namespace App\Models\Site;

use App\Services\Attendance\Contracts\SiteAccountContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;

class SiteAccount extends Model implements SiteAccountContract
{
    protected $table = 'site_accounts';
    protected $guarded = [];

    public function type(): BelongsTo
    {
        return $this->belongsTo(SiteType::class, 'site_type_code', 'code');
    }

    public function getTypeKey(): string
    {
        return $this->type->getKey();
    }

    public function getAccountId(): string
    {
        return Crypt::decryptString($this->account_id);
    }

    public function getPassword(): string
    {
        return Crypt::decryptString($this->account_password);
    }
}