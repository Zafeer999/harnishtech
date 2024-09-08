<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySubcategoryCopySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electrical' => [
                'Wiring & installation',
                'Lighting fixtures',
                'Electrical troubleshooting',
                'Repaired & servicing',
                'Inverter installation & maintenance',
                'Washing machine servicing'
            ],
            'AC Coolcare' => [
                'AC installation & set up',
                'AC maintenance & cleaning',
                'AC repaired',
                'Freeze repairing',
                'Air cooler repairing & servicing'
            ],
            'Plumbing' => [
                'New installation',
                'Repaired',
                'Drainage solution',
                'Water heater installation'
            ],
            'Water RO purified' => [
                'Installation',
                'Service',
                'Repaired'
            ],
            'Industrial work' => [
                'Electrical panel service & cleaning',
                'Cable & wiring work',
                'Motor & gearbox servicing',
                'All types of equipment Servicing'
            ],
            'Painting' => [
                'Internal painting',
                'External painting',
                'Floor painting'
            ]
        ];

        $categoryIndex = 1; // To track category image naming
        $subcategoryIndex = 1; // To track subcategory image naming

        foreach ($categories as $categoryName => $subcategories) {
            // Set the image path for the category with the specified format
            $categoryImagePath = 'storage/category/cat' . str_pad($categoryIndex, 3, '0', STR_PAD_LEFT) . '.png';

            // Use updateOrCreate for category
            $category = Category::updateOrCreate(
                ['name' => $categoryName], // Condition to check if the category exists
                [
                    'description' => $categoryName . ' services',
                    'min_price' => rand(100, 1000), // Example random price
                    'level' => 1, // Level for main categories
                    'image' => $categoryImagePath // Image path for category
                ]
            );

            $categoryIndex++; // Increment category index for the next category

            // Insert or update subcategories
            foreach ($subcategories as $subcategoryName) {
                // Set the image path for the subcategory with the specified format
                $subcategoryImagePath = 'storage/subcategory/sub' . str_pad($subcategoryIndex, 3, '0', STR_PAD_LEFT) . '.png';

                // Correctly associate subcategory with the current category using $category->id
                Category::updateOrCreate(
                    [
                        'name' => $subcategoryName,
                        'category_id' => $category->id // Ensure the category ID is correctly set
                    ],
                    [
                        'description' => $subcategoryName . ' description',
                        'min_price' => rand(100, 1000), // Example random price
                        'level' => 2, // Level for subcategories
                        'image' => $subcategoryImagePath // Image path for subcategory
                    ]
                );

                $subcategoryIndex++; // Increment subcategory index for the next subcategory
            }
        }
        // Insert or update subcategories
        foreach ($subcategories as $subcategoryName) {
            // Set the image path for the subcategory with the specified format
            $subcategoryImagePath = 'storage/subcategory/sub' . str_pad($subcategoryIndex, 3, '0', STR_PAD_LEFT) . '.png';

            // Correctly associate subcategory with the current category using $category->id
            Category::updateOrCreate(
                [
                    'name' => $subcategoryName,
                    'category_id' => $category->id // Ensure the category ID is correctly set
                ],
                [
                    'description' => $subcategoryName . ' description',
                    'min_price' => rand(100, 1000), // Example random price
                    'level' => 2, // Level for subcategories
                    'image' => $subcategoryImagePath // Image path for subcategory
                ]
            );

            $subcategoryIndex++; // Increment subcategory index for the next subcategory
        }



        // foreach ($categories as $categoryName => $subcategories) {
        //     // Set the image path for the category with the specified format
        //     $categoryImagePath = 'storage/category/cat' . str_pad($categoryIndex, 3, '0', STR_PAD_LEFT) . '.png';

        //     // Insert category
        //     $categoryId = DB::table('categories')->updateOrInsert(
        //         ['name' => $categoryName], // Condition to check if the category exists
        //         [
        //             'description' => $categoryName . ' services',
        //             'min_price' => rand(100, 1000), // Example random price
        //             'level' => 1, // Level for main categories
        //             'image' => $categoryImagePath // Image path for category
        //         ]
        //     );

        //     $categoryIndex++; // Increment category index for the next category

        //     foreach ($subcategories as $subcategoryName) {
        //         // Set the image path for the subcategory with the specified format
        //         $subcategoryImagePath = 'storage/subcategory/sub' . str_pad($subcategoryIndex, 3, '0', STR_PAD_LEFT) . '.png';

        //         DB::table('categories')->updateOrInsert(
        //             [
        //                 'name' => $subcategoryName,
        //                 'category_id' => $categoryId,
        //             ], // Condition to check if the subcategory exists
        //             [
        //                 'description' => $subcategoryName . ' description',
        //                 'min_price' => rand(100, 1000), // Example random price
        //                 'level' => 2, // Level for subcategories
        //                 'image' => $subcategoryImagePath // Image path for subcategory
        //             ]
        //         );

        //         $subcategoryIndex++; // Increment subcategory index for the next subcategory
        //     }
        // }
    }
}
