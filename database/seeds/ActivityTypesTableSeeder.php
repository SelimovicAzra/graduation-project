<?php


use App\Models\ActivityType;
use Illuminate\Database\Seeder;

class ActivityTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $activityTypes = factory(ActivityType::class, 10)->create();

        ActivityType::create([
            'id' => 1,
            'name' => 'add',
            'slug' => 'add'
         ]);

        ActivityType::create([
            'id' => 2,
            'name' => 'update',
            'slug' => 'update'
        ]);
        ActivityType::create([
            'id' => 3,
            'name' => 'delete',
            'slug' => 'delete'
        ]);

//        ActivityType::create([
//            'name' => 'show',
//            'slug' => 'show'
//        ]);
    }
}
