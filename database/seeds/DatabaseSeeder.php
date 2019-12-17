<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\Modules\Base\Models\User::class)->create();
        factory(\Modules\Base\Models\Bus::class)->create();
        factory(\Modules\Base\Models\Stop::class)->create();
    }
}
