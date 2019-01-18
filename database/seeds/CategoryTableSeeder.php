<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name' => 'Военное снаряжение, обмундирование, бронежилеты', 'slug' => str_slug('Военное снаряжение, обмундирование, бронежилеты', '-'), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Снаряжение силовых структур (полиция, охрана, СБУ)', 'slug' => str_slug('Снаряжение силовых структур (полиция, охрана, СБУ)', '-') ,'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Средства связи', 'slug' => str_slug('Средства связи', '-') , 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Оружие и аксуссуары', 'slug' => str_slug('Оружие и аксуссуары', '-') , 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Ножи туристические', 'slug' => str_slug('Ножи туристические', '-'), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Оптика', 'slug' => str_slug('Оптика', '-') ,'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Товары для активного отдыха и туризма', 'slug' => str_slug('Товары для активного отдыха и туризма', '-') , 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Рыбалка', 'slug' => str_slug('Рыбалка', '-') , 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Фейерверки', 'slug' => str_slug('Фейерверки', 'slug', '-'), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Подарки и сувениры', 'slug' => str_slug('Подарки и сувениры', '-') ,'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Всё для праздника', 'slug' => str_slug('Всё для праздника', '-') , 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Дом, сад, огород', 'slug' => str_slug('Дом, сад, огород', '-') , 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Сейфы', 'slug' => str_slug('Сейфы', '-'), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Недвижимость', 'slug' => str_slug('Недвижимость', '-') ,'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Разное', 'slug' => str_slug('Разное', '-') , 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Барахолка', 'slug' => str_slug('Барахолка', '-') , 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")]
        ]);
    }
}