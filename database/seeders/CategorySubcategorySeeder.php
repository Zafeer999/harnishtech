<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('categories')->insert([
        $categories = [
            [
                'id' => 1,
                'category_id' => NULL,
                'name' => 'Plumber',
                'image' => 'customer/assets/images/category/EY5fW6hciDfvOQqkqwYxCtOOsRXzS6ZIcyQqUCbl.png',
                'description' => '<p>jgsdb usbdc sdyg cisd bciusdh ciusd cius dicusd</p><ul><li>ewfwe fwetrh etyj e</li><li>&nbsp;fwes ergwth trh&nbsp;</li><li>f weeretyh er gwthr yfg ewhtreyju</li><li>&nbsp;gtrhyjr tr rgwhte yjthrgew gr</li><li>wryj utyhtr yj erhter htr&nbsp;</li></ul>',
                'min_price' => 600,
                'level' => 1,
                'is_featured' => 0,
                'created_at' => '2024-08-17 15:04:34',
                'updated_at' => '2024-08-22 14:56:17',
                'deleted_at' => NULL,
            ],

            [
                'id' => 2,
                'category_id' => NULL,
                'name' => 'AC Repair',
                'image' => 'customer/assets/images/category/Y2EgSQoVEspkT3vVYCfvSLI6oJgFbbjzCfs8psHn.png',
                'description' => '<p>jgsdb usbdc sdyg cisd bciusdh ciusd cius dicusd</p><ul><li>ewfwe fwetrh etyj e</li><li>&nbsp;fwes ergwth trh&nbsp;</li><li>f weeretyh er gwthr yfg ewhtreyju</li><li>&nbsp;gtrhyjr tr rgwhte yjthrgew gr</li><li>wryj utyhtr yj erhter htr&nbsp;</li></ul>',
                'min_price' => 800,
                'level' => 1,
                'is_featured' => 0,
                'created_at' => '2024-08-22 14:56:59',
                'updated_at' => '2024-08-22 14:56:59',
                'deleted_at' => NULL,
            ],

            [
                'id' => 3,
                'category_id' => NULL,
                'name' => 'Gadget Repair',
                'image' => 'customer/assets/images/category/Hy483j0rvAh6oosgqBkGFmzhNFKjJB8fbhJ0uvi9.png',
                'description' => '<p>jgsdb usbdc sdyg cisd bciusdh ciusd cius dicusd</p><ul><li>ewfwe fwetrh etyj e</li><li>&nbsp;fwes ergwth trh&nbsp;</li><li>f weeretyh er gwthr yfg ewhtreyju</li><li>&nbsp;gtrhyjr tr rgwhte yjthrgew gr</li><li>wryj utyhtr yj erhter htr&nbsp;</li></ul>',
                'min_price' => 400,
                'level' => 1,
                'is_featured' => 0,
                'created_at' => '2024-08-22 14:57:56',
                'updated_at' => '2024-08-22 15:32:12',
                'deleted_at' => NULL,
            ],

            [
                'id' => 4,
                'category_id' => NULL,
                'name' => 'Beauty & Salon',
                'image' => 'customer/assets/images/category/wGHxRGi6F6vGqapQ3ETLeSWKri8ndhRWnOrW6zMq.png',
                'description' => '<p>jgsdb usbdc sdyg cisd bciusdh ciusd cius dicusd</p><ul><li>ewfwe fwetrh etyj e</li><li>&nbsp;fwes ergwth trh&nbsp;</li><li>f weeretyh er gwthr yfg ewhtreyju</li><li>&nbsp;gtrhyjr tr rgwhte yjthrgew gr</li><li>wryj utyhtr yj erhter htr&nbsp;</li></ul>',
                'min_price' => 200,
                'level' => 1,
                'is_featured' => 0,
                'created_at' => '2024-08-22 14:58:28',
                'updated_at' => '2024-08-22 14:58:28',
                'deleted_at' => NULL,
            ],

            [
                'id' => 5,
                'category_id' => NULL,
                'name' => 'Pest Control',
                'image' => 'customer/assets/images/category/yHSeVO00Faq64AjuznhLk5mCTRutgx2XYaBwcHnc.png',
                'description' => '<p>jgsdb usbdc sdyg cisd bciusdh ciusd cius dicusd</p><ul><li>ewfwe fwetrh etyj e</li><li>&nbsp;fwes ergwth trh&nbsp;</li><li>f weeretyh er gwthr yfg ewhtreyju</li><li>&nbsp;gtrhyjr tr rgwhte yjthrgew gr</li><li>wryj utyhtr yj erhter htr&nbsp;</li></ul>',
                'min_price' => 1200,
                'level' => 1,
                'is_featured' => 0,
                'created_at' => '2024-08-22 14:59:04',
                'updated_at' => '2024-08-22 14:59:04',
                'deleted_at' => NULL,
            ],

            [
                'id' => 6,
                'category_id' => NULL,
                'name' => 'Car & Motor Service',
                'image' => 'customer/assets/images/category/bzrpSMbSTW8vIfZKGYuYZf9XiWS0yJAQnnjEq1jP.png',
                'description' => '<p>jgsdb usbdc sdyg cisd bciusdh ciusd cius dicusd</p><ul><li>ewfwe fwetrh etyj e</li><li>&nbsp;fwes ergwth trh&nbsp;</li><li>f weeretyh er gwthr yfg ewhtreyju</li><li>&nbsp;gtrhyjr tr rgwhte yjthrgew gr</li><li>wryj utyhtr yj erhter htr&nbsp;</li></ul>',
                'min_price' => 500,
                'level' => 1,
                'is_featured' => 0,
                'created_at' => '2024-08-22 14:59:41',
                'updated_at' => '2024-08-22 14:59:41',
                'deleted_at' => NULL,
            ],

            [
                'id' => 7,
                'category_id' => 2,
                'name' => 'AC Basic Service',
                'image' => 'customer/assets/images/subcategory/MWICWqWwBiDZOTnhiamwuPzQcr86gLISRsxsvIn6.png',
                'description' => '<p>jgsdb usbdc sdyg cisd bciusdh ciusd cius dicusd</p><ul><li>ewfwe fwetrh etyj e</li><li>&nbsp;fwes ergwth trh&nbsp;</li><li>f weeretyh er gwthr yfg ewhtreyju</li><li>&nbsp;gtrhyjr tr rgwhte yjthrgew gr</li><li>wryj utyhtr yj erhter htr&nbsp;</li></ul>',
                'min_price' => 400,
                'level' => 2,
                'is_featured' => 1,
                'created_at' => '2024-08-22 15:00:33',
                'updated_at' => '2024-08-22 15:00:33',
                'deleted_at' => NULL,
            ],

            [
                'id' => 8,
                'category_id' => 2,
                'name' => 'AC Compressor Fitting',
                'image' => 'customer/assets/images/subcategory/FB4ucihdnvkX1hRghcVFaVWqFxGlsWg1MHtMYsvY.png',
                'description' => '<p>jgsdb usbdc sdyg cisd bciusdh ciusd cius dicusd</p><ul><li>ewfwe fwetrh etyj e</li><li>&nbsp;fwes ergwth trh&nbsp;</li><li>f weeretyh er gwthr yfg ewhtreyju</li><li>&nbsp;gtrhyjr tr rgwhte yjthrgew gr</li><li>wryj utyhtr yj erhter htr&nbsp;</li></ul>',
                'min_price' => 1200,
                'level' => 2,
                'is_featured' => 0,
                'created_at' => '2024-08-22 15:01:07',
                'updated_at' => '2024-08-22 15:01:07',
                'deleted_at' => NULL,
            ],

            [
                'id' => 9,
                'category_id' => 4,
                'name' => 'Hair Cutting',
                'image' => 'customer/assets/images/subcategory/EfESdSJMxyJEsUhE7lXwPWH4mKrGOfwYXKmp58zD.png',
                'description' => '<p>jgsdb usbdc sdyg cisd bciusdh ciusd cius dicusd</p><ul><li>ewfwe fwetrh etyj e</li><li>&nbsp;fwes ergwth trh&nbsp;</li><li>f weeretyh er gwthr yfg ewhtreyju</li><li>&nbsp;gtrhyjr tr rgwhte yjthrgew gr</li><li>wryj utyhtr yj erhter htr&nbsp;</li></ul>',
                'min_price' => 300,
                'level' => 2,
                'is_featured' => 0,
                'created_at' => '2024-08-22 15:01:35',
                'updated_at' => '2024-08-22 15:01:35',
                'deleted_at' => NULL,
            ],

            [
                'id' => 10,
                'category_id' => 4,
                'name' => 'Nail Care',
                'image' => 'customer/assets/images/subcategory/CqTuNhPRumyh3djsEJerNG68KRFWgvkWbVvoSy8H.png',
                'description' => '<p>jgsdb usbdc sdyg cisd bciusdh ciusd cius dicusd</p><ul><li>ewfwe fwetrh etyj e</li><li>&nbsp;fwes ergwth trh&nbsp;</li><li>f weeretyh er gwthr yfg ewhtreyju</li><li>&nbsp;gtrhyjr tr rgwhte yjthrgew gr</li><li>wryj utyhtr yj erhter htr&nbsp;</li></ul>',
                'min_price' => 500,
                'level' => 2,
                'is_featured' => 1,
                'created_at' => '2024-08-22 15:01:57',
                'updated_at' => '2024-08-22 15:01:57',
                'deleted_at' => NULL,
            ],

            [
                'id' => 11,
                'category_id' => 2,
                'name' => 'AC Water Drop Problem',
                'image' => 'customer/assets/images/subcategory/rMEreGF2VZRGDMvHz4w6RodU7ndZ7X1A1TC6dxv1.png',
                'description' => '<p>jgsdb usbdc sdyg cisd bciusdh ciusd cius dicusd</p><ul><li>ewfwe fwetrh etyj e</li><li>&nbsp;fwes ergwth trh&nbsp;</li><li>f weeretyh er gwthr yfg ewhtreyju</li><li>&nbsp;gtrhyjr tr rgwhte yjthrgew gr</li><li>wryj utyhtr yj erhter htr&nbsp;</li></ul>',
                'min_price' => 800,
                'level' => 2,
                'is_featured' => 1,
                'created_at' => '2024-08-22 15:01:57',
                'updated_at' => '2024-08-22 15:01:57',
                'deleted_at' => NULL,
            ],
        ];
        foreach ($categories as $category) {
            Category::updateOrCreate(['id' => $category['id']], $category);
        }
    }
}
