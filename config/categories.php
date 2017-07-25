<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/26/17
 * Time: 5:07 PM
 */

return [
    // parent
    0 => [
        'parent' => 'vehicles',
        'sub' => [
            'for sale',
            'for rent',
            'motorcyle',
        ],
        'fields' => [
            ['name' => 'brand_id', 'type' => 'multiple', 'options' => '','is_modal' => true, 'collection_name' => 'brands'], // means related to the category
            ['name' => 'model_id', 'type' => 'multiple', 'options' => '','is_modal' => true, 'collection_name' => 'models'],
            ['name' => 'color_id', 'type' => 'multiple', 'options' => '','is_modal' => false, 'collection_name' => 'colors'],
            ['name' => 'size_id', 'type' => 'multiple', 'options' => '','is_modal' => false, 'collection_name' => 'sizes'],
            ['name' => 'manufacturing_year', 'type' => 'number', 'options' => [1999 => 1999, 2000 => 2000, 2017 => 2017],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'is_new', 'type' => 'multiple', 'options' => ['new' => 1, 'old' => 0],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'is_automatic', 'type' => 'multiple', 'options' => ['manual' => 0, 'automatic' => 1],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'mileage', 'type' => 'number', 'options' => '','is_modal' => false, 'collection_name' => ''],
        ]
    ],
    1 => [
        'parent' => 'mobiles',
        'sub' => [
            'smart phones',
            'tablets',
        ],
        'fields' => [
            ['name' => 'brand_id', 'type' => 'multiple', 'options' => '','is_modal' => true, 'collection_name' => 'brands'], // means related to the category
            ['name' => 'model_id', 'type' => 'multiple', 'options' => '','is_modal' => true, 'collection_name' => ''],
            ['name' => 'color_id', 'type' => 'multiple', 'options' => '','is_modal' => false, 'collection_name' => ''],
            ['name' => 'size_id', 'type' => 'multiple', 'options' => '','is_modal' => false, 'collection_name' => ''],
            ['name' => 'manufacturing_year', 'type' => 'number', 'options' => [1999 => 1999, 2000 => 2000, 2017 => 2017],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'is_new', 'type' => 'multiple', 'options' => ['new' => 1, 'old' => 0],'is_modal' => false, 'collection_name' => ''],
        ]
    ],
    2 => [
        'parent' => 'electronics',
        'sub' => [
            'computers',
            'tvs',
        ],
        'fields' => [
            ['name' => 'brand_id', 'type' => 'multiple', 'options' => '','is_modal' => true, 'collection_name' => 'brands'], // means related to the category
            ['name' => 'model_id', 'type' => 'multiple', 'options' => '','is_modal' => true, 'collection_name' => ''],
            ['name' => 'color_id', 'type' => 'multiple', 'options' => '','is_modal' => false, 'collection_name' => ''],
            ['name' => 'size_id', 'type' => 'multiple', 'options' => '','is_modal' => false, 'collection_name' => ''],
            ['name' => 'manufacturing_year', 'type' => 'number', 'options' => [1999 => 1999, 2000 => 2000, 2017 => 2017],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'is_new', 'type' => 'multiple', 'options' => ['new' => 1, 'old' => 0],'is_modal' => false, 'collection_name' => ''],
        ]
    ],
    3 => [
        'parent' => 'properties for sale',
        'sub' => [
            'Villa - Palace for Sale',
            'Commercial for Sale',
            'Whole Building for Sale',
        ],
        'fields' => [
            ['name' => 'is_new', 'type' => 'multiple', 'options' => ['new' => 1, 'old' => 0],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'is_furnished', 'type' => 'multiple', 'options' => ['no' => 0, 'yes' => 1],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'floor_no', 'type' => 'number', 'options' => ['ground' => 0, 'first' => 1, 'second' => 2],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'building_age', 'type' => 'multiple', 'options' => ['one year' => 1, 'tow years' => 2],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'bathroom_no', 'type' => 'multiple', 'options' => ['one' => 1, 'tow' => 2, 'three' => 3],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'room_no', 'type' => 'multiple', 'options' => ['one' => 1, 'tow' => 2, 'three' => 3],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'type_id', 'type' => 'multiple', 'options' => "",'is_modal' => false, 'collection_name' => ''],
            ['name' => 'space', 'type' => 'text', 'options' => '','is_modal' => false, 'collection_name' => ''],
            ['name' => 'rent_type', 'type' => 'multiple', 'options' => ['daily' => 'daily', 'weekly' => 'weekly', 'monthly' => 'montly', 'yearly' => 'yearly'],'is_modal' => false, 'collection_name' => '']
        ]
    ],
    4 => [
        'parent' => 'properties for rent',
        'sub' => [
            'Villa - Palace for rent',
            'Commercial for rent',
            'Whole Building for rent',
            'Land for rent',
            'Chalets - Summerhouses for rent',
            'Other Real Estate for rent',
        ],
        'fields' => [
            ['name' => 'is_new', 'type' => 'multiple', 'options' => ['new' => 1, 'old' => 0],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'is_furnished', 'type' => 'multiple', 'options' => ['no' => 0, 'yes' => 1],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'floor_no', 'type' => 'number', 'options' => ['ground' => 0, 'first' => 1, 'second' => 2],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'building_age', 'type' => 'multiple', 'options' => ['one year' => 1, 'tow years' => 2],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'bathroom_no', 'type' => 'multiple', 'options' => ['one' => 1, 'tow' => 2, 'three' => 3],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'room_no', 'type' => 'multiple', 'options' => ['one' => 1, 'tow' => 2, 'three' => 3],'is_modal' => false, 'collection_name' => ''],
            ['name' => 'type_id', 'type' => 'multiple', 'options' => "",'is_modal' => false, 'collection_name' => ''],
            ['name' => 'space', 'type' => 'text', 'options' => '','is_modal' => false, 'collection_name' => ''],
            ['name' => 'rent_type', 'type' => 'multiple', 'options' => ['daily' => 'daily', 'weekly' => 'weekly', 'monthly' => 'montly', 'yearly' => 'yearly'],'is_modal' => false, 'collection_name' => '']
        ]
    ],
//    5 => [
//        'parent' => 'kids',
//        'sub' => [
//            'Kids Furniture',
//            'Strollers - Car Seats',
//            'Kids Clothing',
//            'Toys - Games',
//            'Others - Baby - Kids',

//        ]
//    ],
//    6 => [
//        'parent' => 'jobs',
//        'sub' => [
//            'Engineering',
//            'Admin - Secretary',
//            'Accounting - Finance',
//            'Medicine - Nursing',
//            'Computer - IT',
//            'Tutoring - Training',
//            'Sales - Marketing',
//            'Drivers - Delivery',
//            'Media - Design - Creative',
//            'Recruitment - HR',
//            'Media - Advertising',
//            'Costumer Service',
//            'Maids - Home Staff',
//        ]
//    ]
];

/*'brands' => ['BMW', 'Mistubishi', 'Hyundi', 'Honda']
'brands' => ['Apple', 'Samsung', 'hwawi', 'sony']*/