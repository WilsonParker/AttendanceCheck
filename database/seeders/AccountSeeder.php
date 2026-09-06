<?php

namespace Database\Seeders;

use App\Models\Site\SiteAccount;
use App\Services\Attendance\SiteType;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteAccount::create([
            'site_type_code' => SiteType::AppleFile->value,
            'account_id' => "eyJpdiI6IkQwa2lSUjMra1FqdGplSGtDR0RDUEE9PSIsInZhbHVlIjoid3ZVLzJWSWV0SE1kd3B3L1Nrb1huUT09IiwibWFjIjoiZWNkOTg5MGVlNWI5MjY4NzJkZDQwYWU3ZmQ0MWI4NGVhZjcwM2MyODIzZGYzNjYxOGY3ZWU4NzhmYjE5Zjc2NCIsInRhZyI6IiJ9",
            'account_password' => "eyJpdiI6Ii9CNEY0bDJIanVJM21xU0FrVVRUV0E9PSIsInZhbHVlIjoiMlpoRHk1K2IwUHVxK1o1cDRYVU1Edz09IiwibWFjIjoiYWFlMzY1YmExYWIwOTQ5YjA0MWRhMzUxMGRiYzNmOGNjZDFjZmE1MWM5YjY5OWE3YzVhOGVlMzY0OGU0MGJlNCIsInRhZyI6IiJ9",
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::YesFile->value,
            'account_id' => 'eyJpdiI6IlFHZ3RlOStYOHBNSDVsQzJjRG9adEE9PSIsInZhbHVlIjoiVEsxdEM5bnRvdU5mamRKb3o4SUN1QT09IiwibWFjIjoiZjA2NGEzMTQxZGI4ZmU5MzI2ODU3OGU0NDQ5MWQ3NjNhYWM5MTNlOGUwZDM1YWE3MWYzYjk1MjAxNzk4ZjU2NCIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6InVVSndWT0FlL1NSWkdWam1BWFRLckE9PSIsInZhbHVlIjoiQzY4T3NZbXE0Z0RoVW9aS0NSUm4rdz09IiwibWFjIjoiNGU0ZWVlODQxNTNhYjQ5ZTA4NjA2YzM3OTQyNTQyZGY3MzliZjdmYWIwMjRlNjdiZTcxNjJiNjA0MDkxYjRlYiIsInRhZyI6IiJ9',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::YesFile->value,
            'account_id' => 'eyJpdiI6IkI0ajU5cWRqbjhSdCswSWcwajZMSnc9PSIsInZhbHVlIjoiSlhUSTUxTjZpWXZyYVJNZWg2cS9nQT09IiwibWFjIjoiZDI3NTMzOTM1YzJlOTMyOWQ4MjMxZDY2YTc5ZDcyZDUyZThkNDYwZjY5NjE0N2FjYmI3ZTU4ZTAzN2E3OWZiZiIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6IlFLY1hwRVpPZGx1emlUd1RJc2FCR0E9PSIsInZhbHVlIjoiZk9SWGsxNEZ1cW14K0xQL2ZnSitxQT09IiwibWFjIjoiODVhNjlmYTJlMzA1MTdjOTU5ZGZiNzRiYWRhM2ZlMTRjOTdiY2JjZmM1M2FiYWE3MWEyNmNhYmJmMzA4MDNiMyIsInRhZyI6IiJ9',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::YesFile->value,
            'account_id' => 'eyJpdiI6IlZqTFhwZWhmVWd4dUppK1pLcmNtbWc9PSIsInZhbHVlIjoiMnFNa3dxbWNHZXZQWEFEeFNPc3o5QT09IiwibWFjIjoiNDlkZDg2NzNjZjYzOWVlNzcxOTFmNTY5ZmViZWRlZmE4ZGIwMzJiZmMwZWE4ZjYxY2U1ZjNmYTExZjZkMGU5NyIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6InBmcTBtWUo4clNVL2lwcVgrNFF0bWc9PSIsInZhbHVlIjoiakswUEt5bTMwbnpxeHUrbllFaVJydz09IiwibWFjIjoiYjI0ZjYwZWU2ZjAyM2M1ZDY3ZTFlZGZmZDZiNzZhYzI0MTgzYWFmNzI1MTdlNzI5MzMzY2E4OGE1OWRjYTI5YyIsInRhZyI6IiJ9',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::FileCity->value,
            'account_id' => 'eyJpdiI6ImJVeXphanF6NHE3VFFuU1haRXVhOXc9PSIsInZhbHVlIjoiV2VVOUROV054dzlDQ1ZLekFxeEhoZz09IiwibWFjIjoiM2RkMGNkMzg5NjE2YWU0OTZkZGUxNzA1OTgzYTMxYzYyNGY0MjQ1YjgzYzA4YjEzN2FhYTE0OWY4YmM4NGEyOSIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6IjI1TEszY1lsM3AvSFpmMzRhZmUxc3c9PSIsInZhbHVlIjoiU3lpRHVRL0NBbklnVlZLRll2VHRQQT09IiwibWFjIjoiNTMyZjEzMDYxNzhlNGViOTQ1Y2YyOTNlN2JiYzllYWQwNzRlMmNiYTYxZWQ4YWY4Y2MyZDQyYmQ1Y2UxOGJjNCIsInRhZyI6IiJ9',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::ShareBox->value,
            'account_id' => 'eyJpdiI6ImFTZE1QQUhsVFpObDhBTXV6eldKbVE9PSIsInZhbHVlIjoiYnBkMlNRc0VlajF0QnBtaitSOVpUdz09IiwibWFjIjoiYTFiZTA5OGQ4NDBlNDc4ZTQ2ZWJjOTQyZTVkYTM4ZTI1NWFjYjk5YTgxOGNhNDVjMDA5NzBiOGI3ZDhhOGVjNiIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6IkI3RUU1YTNFTC9laVNXWTlaRFdGOUE9PSIsInZhbHVlIjoiQi9DOTkvU2xDYmZKTm9qelptc1dpZz09IiwibWFjIjoiZTI2ZWE1YTk5ODljNTZjYjUyN2EzNmQxZjIwMDQ4YTM1NWU2NzlkN2QxYmIxMjU0ZTAxZTgyOGU1MTUyOTMwOCIsInRhZyI6IiJ9',
        ]);
    }
}