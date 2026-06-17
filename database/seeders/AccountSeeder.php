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
            'account_id' => 'eyJpdiI6IjU5TDY1RDUzRjhaK0hMb3JaYTV5dHc9PSIsInZhbHVlIjoib3ZBUlZRSm9JNE83aThxajkydkc1Zz09IiwibWFjIjoiNjFkOWVhMWEyZGZhMjQyNWE0NzZhYTk3MTkwNDU3OGQ0NGU3NmFmYWY0ODBhNTA2MjZiMmJmMTEzYjkwNzc2OCIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6InlsaGY4aEN4aFBadVgrWjdkdmN4dVE9PSIsInZhbHVlIjoicXAvQkU2MHpsMWoycU5haVZGaWgzdz09IiwibWFjIjoiYzRkMDQ4ZDVkZTdmZDIxNTQ3ZWIwZjAyZDkzOWQ1NjhkMGM0MDJmOTc4Mjk0NzhiOTA3MjRhNzQ1ODE3ZTVmMiIsInRhZyI6IiJ9',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::YesFile->value,
            'account_id' => 'eyJpdiI6IjU5TDY1RDUzRjhaK0hMb3JaYTV5dHc9PSIsInZhbHVlIjoib3ZBUlZRSm9JNE83aThxajkydkc1Zz09IiwibWFjIjoiNjFkOWVhMWEyZGZhMjQyNWE0NzZhYTk3MTkwNDU3OGQ0NGU3NmFmYWY0ODBhNTA2MjZiMmJmMTEzYjkwNzc2OCIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6InlsaGY4aEN4aFBadVgrWjdkdmN4dVE9PSIsInZhbHVlIjoicXAvQkU2MHpsMWoycU5haVZGaWgzdz09IiwibWFjIjoiYzRkMDQ4ZDVkZTdmZDIxNTQ3ZWIwZjAyZDkzOWQ1NjhkMGM0MDJmOTc4Mjk0NzhiOTA3MjRhNzQ1ODE3ZTVmMiIsInRhZyI6IiJ9',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::YesFile->value,
            'account_id' => 'eyJpdiI6InFOVmV6cytsWHBXdnlpOGJiOVM1aFE9PSIsInZhbHVlIjoiV2FtbmtQSEEvRnZGTzJtWVQ3ZTVCQT09IiwibWFjIjoiYmVlZTRkM2Y1ZmM1NWJlMDVkZjk5MGQ1NTA4N2E4MWY3MmRkYjU4ZTNkMzBlZjg2NTY5NDFhZmRkM2UwN2YxYiIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6IjdYQnUwaHp2UFFub2VCZnVNSVZPZ0E9PSIsInZhbHVlIjoiN2FqMnNaa0lXSjZ6Zk5lT1VCem1BQT09IiwibWFjIjoiZmQxYTcwZWM4ZWU2NjljMGU0OTJiMThmOTM0Nzg0NWJmNWI3MzQ5ZmM5NTBjNGNkYjkwMjRhNGEwMmY1MWI4OSIsInRhZyI6IiJ9',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::YesFile->value,
            'account_id' => 'eyJpdiI6IkpCZk1Hek1lZ2VQT015dXN4am9HUFE9PSIsInZhbHVlIjoiKzZjM09iWG8vTmlaUHlsdlZnRU41UT09IiwibWFjIjoiNDg2ZmJjNzY5MTg5N2RiMTczYzVjMTcwNDMyNzU0OTExZDJlNDkyODA5NWU3OWRiNzY0MTI4MmE5ZjRmMjk2OSIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6IjdYQnUwaHp2UFFub2VCZnVNSVZPZ0E9PSIsInZhbHVlIjoiN2FqMnNaa0lXSjZ6Zk5lT1VCem1BQT09IiwibWFjIjoiZmQxYTcwZWM4ZWU2NjljMGU0OTJiMThmOTM0Nzg0NWJmNWI3MzQ5ZmM5NTBjNGNkYjkwMjRhNGEwMmY1MWI4OSIsInRhZyI6IiJ9',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::FileCity->value,
            'account_id' => 'eyJpdiI6IlZDTHNyS0dFUWtzYnByVWJxb0sxN2c9PSIsInZhbHVlIjoiMzZ4UGh0VmZNS3VQeGdVZDBoYk55UT09IiwibWFjIjoiMWI1NjdmYTBlNzZmZDM3NWYzMTk1OTAxY2FmMmI0MWRlOTc5NmEzMzEwYmQxYzYzYTU1MWNjZmUzMzcwOGZlMSIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6IlRudXJhUGIzR25PQXFDdGZyUTM4aXc9PSIsInZhbHVlIjoibFhJOFB5ZjczekpZcjBmWHpveHhEdz09IiwibWFjIjoiMjhlYzgwZTk4MDJlOWM0MjQxNTY1YjY0OWMzMzEwNzYzYTQwMDk1M2MyMmRiNjNjNjRmNDk5NTNmNmY5ZmI4OCIsInRhZyI6IiJ9',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::ShareBox->value,
            'account_id' => 'eyJpdiI6Ii9SWjBWdTJLZGR0RkcyTkpSZU1kUGc9PSIsInZhbHVlIjoiSDlWbEpUWDg1WXlFUzRRY096VjZWZz09IiwibWFjIjoiZjQ5NGUxNWRlN2NhZDQwNDk1ZmZkOGFkMmViNmNiZDAyOWU2MTczYWIwM2Y4YmE3YTExY2QzMzRiNzBjNzJlNCIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6InZLSFhqVUgyandXWWd4cmlUTmtXK3c9PSIsInZhbHVlIjoiMDMyNHhyeDNleFpIcW1OS0NiQ2syZz09IiwibWFjIjoiYjcyYWI3MzE2OTc4MGE2MThlMDRlOGFhZTBmZGY0OWQ5ZWJlOTVhNmY5ZWExYTI3NjIxNWNmNDJlNDNmMWIwMCIsInRhZyI6IiJ9',
        ]);
    }
}
