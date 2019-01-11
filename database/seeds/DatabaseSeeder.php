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
        $this->call(Product_Type_Seeder::class);
        $this->call(Product_Seeder::class);
        $this->call(Users_Seeder::class);
        $this->call(Carte_Credit_Seeder::class);
        $this->call(Code_Promo_Seeder::class);
        $this->call(Customers_seeder::class);
        $this->call(Bills_seeder::class);
        $this->call(Bill_Detail_seeder::class);
        $this->call(Slide_Seeder::class);
    }
}
