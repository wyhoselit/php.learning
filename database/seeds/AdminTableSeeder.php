<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->email = "oselit@elit.os";
        $admin->password = bcrypt('oselit@admin');
        $admin->save();
    }
}
