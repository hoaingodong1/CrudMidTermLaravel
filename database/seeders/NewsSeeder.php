<?php
//DB nằm trong schemma
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $limit = 100;
        $fake = Faker::create();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('news')->insert([
                'title' => $fake->name,
                'image'=>$fake->text,
                'description' =>$fake->text,
                'author' => $fake->text,
            ]);
        }
    }
}
// Thực hiện tạo seeder khoảng 3 records cho mỗi bảng, (category và products)
// Làm xong nhớ gửi bài lên cho thầy 
 
