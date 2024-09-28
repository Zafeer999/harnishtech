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

        $categoryIndex = 1;
        $subcategoryIndex = 1;

        foreach ($categories as $categoryName => $subcategories) {
            $categoryImagePath = 'storage/category/cat' . str_pad($categoryIndex, 3, '0', STR_PAD_LEFT) . '.png';

            $category = Category::updateOrCreate(
                ['name' => $categoryName],
                [
                    'description' => $categoryName . ' services',
                    'min_price' => rand(100, 1000),
                    'level' => 1,
                    'image' => $categoryImagePath
                ]
            );

            $categoryIndex++;

            foreach ($subcategories as $subcategoryName)
            {
                $subcategoryImagePath = 'storage/subcategory/sub' . str_pad($subcategoryIndex, 3, '0', STR_PAD_LEFT) . '.png';

                Category::updateOrCreate(
                    [
                        'name' => $subcategoryName,
                        'category_id' => $category->id
                    ],
                    [
                        'description' => $subcategoryName . ' description',
                        'min_price' => rand(100, 1000),
                        'level' => 2,
                        'image' => $subcategoryImagePath
                    ]
                );

                $subcategoryIndex++;
            }
        }

        foreach ($subcategories as $subcategoryName)
        {
            $subcategoryImagePath = 'storage/subcategory/sub' . str_pad($subcategoryIndex, 3, '0', STR_PAD_LEFT) . '.png';

            Category::updateOrCreate(
                [
                    'name' => $subcategoryName,
                    'category_id' => $category->id
                ],
                [
                    'description' => $subcategoryName . ' description',
                    'min_price' => rand(100, 1000),
                    'level' => 2,
                    'image' => $subcategoryImagePath
                ]
            );

            $subcategoryIndex++;
        }

    }
}
