<?php

use Illuminate\Database\Seeder;
use App\Book;
use Faker\Generator as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 20; $i++) {
            $book = new Book();
            $book->title = $faker->sentence(3);
            $book->author = $faker->name;
            $book->price = $faker->randomFloat(2, 9, 120);

            $book->isbn = "";
            for($j = 0; $j < 13; $j++) {
                $book->isbn .= $faker->randomDigit;
            }

            if($i>5) {
                $book->created_at = $faker->dateTime();
                $book->updated_at = $faker->dateTime();
            }
            $book->description = $faker->text;    
            $book->save();
        }
    }
}
