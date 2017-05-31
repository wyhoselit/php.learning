<?php

use Illuminate\Database\Seeder;
use App\Action;
Use App\Category;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat1 = new Category();
        $cat1->name= "Catgegory A";
        $cat1->save();

        $cat2 = new Category();
        $cat2->name= "Catgegory B";
        $cat2->save();

      // php artisan make:seed ActionSeeder
      // add DatabaseSeeder
        $action = new Action();
        $action->name = "Blog";
        $action->vote = "5";
        $action->save(); //build in laravel model
        $cat1->actions()->attach($action);
        $cat2->actions()->attach($action);

        $action = new Action();
        $action->name = "Contact";
        $action->vote = "15";
        $action->save(); //build in laravel model
        $cat1->actions()->attach($action);

        $action = new Action();
        $action->name = "About";
        $action->vote = "20";
        $action->save(); //build in laravel model
        $cat2->actions()->attach($action);

        $action = new Action();
        $action->name = "newAction";
        $action->vote = "3";
        $action->save(); //build in laravel model
        $cat1->actions()->attach($action);
        $cat2->actions()->attach($action);

        //php artisan db:seed
    }
}
