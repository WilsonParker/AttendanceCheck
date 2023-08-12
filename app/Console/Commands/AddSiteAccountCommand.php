<?php


namespace App\Console\Commands;


use App\Models\Site\SiteAccount;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Crypt;

class AddSiteAccountCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:add
                            {type : The type of the site.}
                            {id : The id of the site.}
                            {pw : The password of the site.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add account.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        SiteAccount::create([
            'site_type_code' => $this->argument('type'),
            'account_id' => Crypt::encryptString($this->argument('id')),
            'account_password' => Crypt::encryptString($this->argument('pw')),
        ]);
    }

}