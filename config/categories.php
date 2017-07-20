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
            'brand_id',
            'model_id',
            'manufacturing_year',
            'condition',
            'transmission',
            'mileage'
        ]
    ],
    1 => [
        'parent' => 'mobiles',
        'sub' => [
            'smart phones',
            'tablets',
        ],
        'fields' => [
            'brand_id',
            'model_id',
            'condition'
        ]
    ],
    2 => [
        'parent' => 'electronics',
        'sub' => [
            'computers',
            'tvs',
        ],
        'fields' => [
            'brand_id',
            'model_id',
            'condition'
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
            'condition',
            'furnished',
            'floor_no',
            'building_age',
            'bathroom_no',
            'room_no',
            'type_id',
            'space',
            'rent_type'
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
            'condition',
            'furnished',
            'floor_no',
            'building_age',
            'bathroom_no',
            'room_no',
            'type_id',
            'space',
            'rent_type'
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