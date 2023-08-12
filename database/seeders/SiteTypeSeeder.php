<?php

namespace Database\Seeders;

use App\Models\Site\SiteType;
use Illuminate\Database\Seeder;

class SiteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(\App\Services\Attendance\SiteType::cases())
            ->each(fn($item) => SiteType::create([
                'code' => $item->value,
                'description' => '',
            ]));
    }
}
