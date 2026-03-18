<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            ['name' => 'Nepal', 'country_code' => 'NP', 'phone_extension' => '+977', 'meta' => json_encode(['currency' => 'NPR'])],
            ['name' => 'India', 'country_code' => 'IN', 'phone_extension' => '+91', 'meta' => json_encode(['currency' => 'INR'])],
            ['name' => 'China', 'country_code' => 'CN', 'phone_extension' => '+86', 'meta' => json_encode(['currency' => 'CNY'])],
            ['name' => 'United States', 'country_code' => 'US', 'phone_extension' => '+1', 'meta' => json_encode(['currency' => 'USD'])],
            ['name' => 'United Kingdom', 'country_code' => 'GB', 'phone_extension' => '+44', 'meta' => json_encode(['currency' => 'GBP'])],
            ['name' => 'Australia', 'country_code' => 'AU', 'phone_extension' => '+61', 'meta' => json_encode(['currency' => 'AUD'])],
            ['name' => 'Germany', 'country_code' => 'DE', 'phone_extension' => '+49', 'meta' => json_encode(['currency' => 'EUR'])],
            ['name' => 'France', 'country_code' => 'FR', 'phone_extension' => '+33', 'meta' => json_encode(['currency' => 'EUR'])],
            ['name' => 'Japan', 'country_code' => 'JP', 'phone_extension' => '+81', 'meta' => json_encode(['currency' => 'JPY'])],
            ['name' => 'South Korea', 'country_code' => 'KR', 'phone_extension' => '+82', 'meta' => json_encode(['currency' => 'KRW'])],
            ['name' => 'Spain', 'country_code' => 'ES', 'phone_extension' => '+34', 'meta' => json_encode(['currency' => 'EUR'])],
            ['name' => 'Italy', 'country_code' => 'IT', 'phone_extension' => '+39', 'meta' => json_encode(['currency' => 'EUR'])],
            ['name' => 'Canada', 'country_code' => 'CA', 'phone_extension' => '+1', 'meta' => json_encode(['currency' => 'CAD'])],
            ['name' => 'Netherlands', 'country_code' => 'NL', 'phone_extension' => '+31', 'meta' => json_encode(['currency' => 'EUR'])],
            ['name' => 'Thailand', 'country_code' => 'TH', 'phone_extension' => '+66', 'meta' => json_encode(['currency' => 'THB'])],
            ['name' => 'Sri Lanka', 'country_code' => 'LK', 'phone_extension' => '+94', 'meta' => json_encode(['currency' => 'LKR'])],
            ['name' => 'Bangladesh', 'country_code' => 'BD', 'phone_extension' => '+880', 'meta' => json_encode(['currency' => 'BDT'])],
        ];

        $now = now();

        foreach ($countries as $country) {
            $this->createOrUpdate($country, $now);
        }
    }

    private function createOrUpdate(array $country, $now): void
    {
        $exists = DB::table('countries')->where('country_code', $country['country_code'])->exists();

        if ($exists) {
            DB::table('countries')
                ->where('country_code', $country['country_code'])
                ->update([
                    'name' => $country['name'],
                    'country_code' => $country['country_code'],
                    'phone_extension' => $country['phone_extension'],
                    'meta' => $country['meta'],
                    'updated_at' => $now,
                ]);

            return;
        }

        DB::table('countries')->insert([
            'name' => $country['name'],
            'country_code' => $country['country_code'],
            'phone_extension' => $country['phone_extension'],
            'meta' => $country['meta'],
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
