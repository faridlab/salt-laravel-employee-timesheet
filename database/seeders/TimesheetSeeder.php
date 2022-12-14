<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class TimesheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                "id" => Str::uuid()->toString(),
                'group' => 'timesheet_settings',
                'key' => 'work-max-hour',
                'value' => 8,
            ],
            [
                "id" => Str::uuid()->toString(),
                'group' => 'timesheet_settings',
                'key' => 'overtime-max-hour',
                'value' => 8,
            ],
        ];
        DB::table('sysparams')->insert($settings);
    }
}
