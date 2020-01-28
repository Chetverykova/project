<?php

use Illuminate\Database\Seeder;
use App\Transaction;
use App\Note;

class CreateTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {

            Transaction::create([
                'user_id' => $faker->numberBetween(1,10),
                'amount' => $faker->numberBetween(199,499),
                'type' => $faker->randomElement(['debit' ,'credit']),
            ]);

            Note::create([
                'transaction_id' => $faker->numberBetween(1,10),
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),

            ]);
        }

    }
}
