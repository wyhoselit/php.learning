<?php

use Illuminate\Database\Seeder;
use App\Action;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      // php artisan make:seed ActionSeeder
      // add DatabaseSeeder
        $action = new Action();
        $action->name = "Blog";
        $action->vote = "5";
        $action->save(); //build in laravel model

        $action = new Action();
        $action->name = "Contact";
        $action->vote = "15";
        $action->save(); //build in laravel model

        $action = new Action();
        $action->name = "About";
        $action->vote = "20";
        $action->save(); //build in laravel model
        
        $action = new Action();
        $action->name = "newAction";
        $action->vote = "3";
        $action->save(); //build in laravel model
        //php artisan db:seed
    }
}
