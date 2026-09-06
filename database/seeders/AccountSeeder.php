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
            'account_id' => 'eyJpdiI6IkNWQjA0bVYvTy9tOWE0NWYyYzd1QUE9PSIsInZhbHVlIjoic1RpTHFCOWdxdG9WNE02ekRhby82YUR2aGROcnJzL3JEcEU0ZGJlQ0dGcz0iLCJtYWMiOiJhZGE2MDViYmNmNWQzYzQ2YWM4ZTYxM2ZlMzdkZGU3MWU4ZDc4MWIwNjJlYzQyODEwM2YzNDk3MjI5MTRiNGNjIiwidGFnIjoiIn0==',
            'account_password' => 'eyJpdiI6InV4V0VzMGp4cktDZHJtNWxuMzRPb0E9PSIsInZhbHVlIjoiWE0xUVJMOWNyRU9Kc2ZEdXkwellqZz09IiwibWFjIjoiZmM3NjRmMjZkYzNmZmQzZWFmOGE2NzNjMzNkODVkOTZhOTkyMGVjNDAxYjgwMjkxZGI4YWIyMzhkMmVmM2YzMSIsInRhZyI6IiJ9',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::YesFile->value,
            'account_id' => 'eyJpdiI6IlQ4OS9hVXFJL1FJVWZQakF0UkVBSnc9PSIsInZhbHVlIjoiVUNHWkxaQ041RkdyeUlLVUZJSlRmZz09IiwibWFjIjoiMDcxN2U5YmViMjhjZDExYzVjN2FhNTU3NDg1NTY4YjI4NjQ5ZWM5YWJmNjVlN2RiM2EzODM0ODUzMDRmMGI5NiIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6ImkvTkU0OFc5bUV3Wi82QUdjTkRqY3c9PSIsInZhbHVlIjoiQnFKbS8zeVlLbUdZaTJxM3g2NmNGSWFYaXhWb1AvQWR6aU5SZ2pYUmRFaz0iLCJtYWMiOiJiZGU0NjNhODQwNmQ4MmFjNTkxMTg3MzM0MjU0MzJhOGJmNjM5NTRhNDVkNTM4MDg1NzI2MGI5MWI2NDZiZjhjIiwidGFnIjoiIn0=',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::YesFile->value,
            'account_id' => 'eyJpdiI6IlBrdmpKYTAwNDNzbXpwaGdnME9Mc0E9PSIsInZhbHVlIjoiUE5JUzJxTng1eUNuSWpPckVVOGhEdz09IiwibWFjIjoiOGFlNTlkZWUwNWY5MDZjNjA0Zjg0MTgwMDI5MjNhYTA5NjUwNDY4MmUxNjY3NzhkMWNlMjFlNjBhMjkxMWUxNCIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6Ik1nY1dSVndxci9CWW1oRDc5RHY2SlE9PSIsInZhbHVlIjoiakxYK2djeUVJMDBkV0lUdmxzMXJRcG45cU1hWFhWNEFpTEI5eGVyT3RTZz0iLCJtYWMiOiJiYzVhNDg5ODU4Mjc4Y2VmOTFjYmVlNGM0NDE3ZWQ5ZjgzNzNhODk1YTc2YTI1YTYyZjk1MTZiNTJiOGUwYTY0IiwidGFnIjoiIn0=',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::YesFile->value,
            'account_id' => 'eyJpdiI6Ik5MQWtOWWE0bXZmV0tUbEdmUy9IUnc9PSIsInZhbHVlIjoiNFdHaWVUelkwR3JkMkNENElqQVIrRHNWZGZaWVVHSThYVE9jT21RZzA2ND0iLCJtYWMiOiIwYTUyNWNmNGYwMGU4NTQ5NWE0NzY2YmJlOWExOWY0YzUzZjllYTIyOTExYThjOGU0NjY4OTFhMmVkYzFkMTVjIiwidGFnIjoiIn0=',
            'account_password' => 'eyJpdiI6IjJGbFJNUDIxU01tWE00RWVsWFoyUkE9PSIsInZhbHVlIjoiUlNHdGFPR2RIZ1gwSXZYdys5K05Vdz09IiwibWFjIjoiMTRlMzgwMmExYTQ4NzYxMzk1MGI1ZThkZWQ3NzNkODkwODdlMmQzZDgwOTEzMWYxMjEzYWJkOTZlOTc0YThiYSIsInRhZyI6IiJ9',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::FileCity->value,
            'account_id' => 'eyJpdiI6Ik9Va2ZYajZMT056WDVQbDR3SWNTTkE9PSIsInZhbHVlIjoibnBnSXhJTFJsTmowSHliMUVqNWJXdz09IiwibWFjIjoiNzAwNDRhODcyODI0YjZlNDJiZGY2MGFkMTIwZGVjNjI2OTBhYmQyYmU0NjkxZjBiZGVkMWJiNzUzMDk3ZTBjNSIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6IjRBVmlXaWxaaVEzMlZyU0dnT05HOGc9PSIsInZhbHVlIjoiTkJIVlM1UC83ZW42YnVYSEdrK250dz09IiwibWFjIjoiZjBhOTY3ZTY2NTE0MmNhMzJlNjViNjI3NmI1Y2Q2MTQyZjVkOWVlODZkNDI3MDVhMDBmOTMyZjY0NDNmNmMwNiIsInRhZyI6IiJ9',
        ]);

        SiteAccount::create([
            'site_type_code' => SiteType::ShareBox->value,
            'account_id' => 'eyJpdiI6ImZ1b1FvenkzYVlTeFRvc1hoRENnclE9PSIsInZhbHVlIjoiZnNqVzV4RVNGU3E1aWVmUjVmUkovUT09IiwibWFjIjoiNTNkMjhhNjBjZDZkYWY0ZWJlODg5MDFmYzA2YjI4YWQyN2VhYWMwMmI5ZGVmOWRmMWJhOWVkOWE3OGYyYmJkZSIsInRhZyI6IiJ9',
            'account_password' => 'eyJpdiI6ImlERWpVZ1lZWFRKL2tHc0VaVHFJb1E9PSIsInZhbHVlIjoiMml3V0NLakc3NnpJamRSRDJoTmtuU2ZCcCtvL3lqYnA4MS9QQVZBRWJwdz0iLCJtYWMiOiIyZThjNmNkZDE4OTZlYzFjMmRjZjQ2N2VkODIzOGE1MzZiN2MwYWU0NDA4OGRlYTdhMDhkMWRjN2JhZDQ4ZGMxIiwidGFnIjoiIn0=',
        ]);
    }
}