<?php


use App\Models\ActivityLog;
use Illuminate\Database\Seeder;

class ActivityLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $activityLogs = factory(ActivityLog::class, 10)->create();

       ActivityLog::create([
           'model_id' => 1,
            'model_type' => 'App\Models\User',
           'activity_type_id' =>3,
        ]);
        ActivityLog:: create([
            'model_id' => 1,
            'model_type' => 'App\Models\City',
            'activity_type_id' =>1,
        ]);
        ActivityLog:: create([
            'model_id' => 1,
            'model_type' => 'App\Models\Country',
            'activity_type_id' =>1,
        ]);
        ActivityLog:: create([
            'model_id' => 1,
            'model_type' => 'App\Models\Category',
            'activity_type_id' =>1,
        ]);
        ActivityLog:: create([
            'model_id' => 1,
            'model_type' => 'App\Models\Donation',
            'activity_type_id' =>1,
        ]);

    }
}
