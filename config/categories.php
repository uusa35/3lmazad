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
            ['name' => 'brand_id', 'type' => 'multiple', 'group' => 'brands','options' => ''],
            ['name' => 'model_id', 'type' => 'multiple', 'group' => 'models','options' => ''],
            ['name' => 'manufacturing_year', 'type' => 'number', 'group' => 'manufacturing_year','options' => [range(1980,2017)]],
            ['name' => 'condition', 'type' => 'multiple', 'group' => 'condition','options' => ['new','old']],
            ['name' => 'transmission', 'type' => 'multiple', 'group' => 'transmission','options' => ['manual','automatic']],
            ['name' => 'mileage', 'type' => 'number', 'group' => 'mileage','options' => ''],
        ]
    ],
    1 => [
        'parent' => 'mobiles',
        'sub' => [
            'smart phones',
            'tablets',
        ],
        'fields' => [
            ['name' => 'brand_id', 'type' => 'multiple', 'group' => 'brands','options' => ''],
            ['name' => 'model_id', 'type' => 'multiple', 'group' => 'models','options' => ''],
            ['name' => 'condition', 'type' => 'multiple', 'group' => 'condition','options' => ['new','old']],
        ]
    ],
    2 => [
        'parent' => 'electronics',
        'sub' => [
            'computers',
            'tvs',
        ],
        'fields' => [
            ['name' => 'brand_id', 'type' => 'multiple', 'group' => 'brands','options' => ''],
            ['name' => 'model_id', 'type' => 'multiple', 'group' => 'models','options' => ''],
            ['name' => 'condition', 'type' => 'multiple', 'group' => 'condition','options' => ['new','old']],
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
            ['name' => 'condition', 'type' => 'multiple', 'group' => 'condition','options' => ['new','old']],
            ['name' => 'furnished', 'type' => 'multiple', 'group' => 'furnished','options' => [0,1]],
            ['name' => 'floor_no', 'type' => 'number', 'group' => 'floor_no','options' => [range(1,5)]],
            ['name' => 'building_age', 'type' => 'multiple', 'group' => 'building_age','options' => [range(1,5)]],
            ['name' => 'bathroom_no', 'type' => 'multiple', 'group' => 'bathroom_no','options' => [range(1,5)]],
            ['name' => 'room_no', 'type' => 'multiple', 'group' => 'room_no','options' => [range(1,5)]],
            ['name' => 'type_id', 'type' => 'multiple', 'group' => 'type_id','options' => ""],
            ['name' => 'space', 'type' => 'text', 'group' => 'space','options' => ''],
            ['name' => 'rent_type', 'type' => 'multiple', 'group' => 'rent_type','options' => ['daily','weekly','monthly','yearly']]
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
            ['name' => 'condition', 'type' => 'multiple', 'group' => 'condition','options' => ['new','old']],
            ['name' => 'furnished', 'type' => 'multiple', 'group' => 'furnished','options' => [0,1]],
            ['name' => 'floor_no', 'type' => 'number', 'group' => 'floor_no','options' => [range(1,5)]],
            ['name' => 'building_age', 'type' => 'multiple', 'group' => 'building_age','options' => [range(1,5)]],
            ['name' => 'bathroom_no', 'type' => 'multiple', 'group' => 'bathroom_no','options' => [range(1,5)]],
            ['name' => 'room_no', 'type' => 'multiple', 'group' => 'room_no','options' => [range(1,5)]],
            ['name' => 'type_id', 'type' => 'multiple', 'group' => 'type_id','options' => ""],
            ['name' => 'space', 'type' => 'text', 'group' => 'space','options' => ''],
            ['name' => 'rent_type', 'type' => 'multiple', 'group' => 'rent_type','options' => ['daily','weekly','monthly','yearly']]
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