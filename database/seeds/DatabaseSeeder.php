<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(RemsTableSeeder::class);
         $this->call(OtrsTableSeeder::class);
         $this->call(TypesTableSeeder::class);
         $this->call(PaspsTableSeeder::class);
         $this->call(ConsumersTableSeeder::class);
        

    }

 }
