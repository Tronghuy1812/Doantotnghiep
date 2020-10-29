<?php
return [
    'sidebar' => [
        [
            'name' => 'Tổng quan',
            'route' => 'get_admin.dashboard',
            'class-icon' => 'la la-tachometer-alt'
        ],
        [
            'name' => 'Khoá học',
            'class-icon' => 'la la-book-open',
            'sub' => [
                [
                    'name' => 'Từ khoá',
                    'route' => 'get_admin.tag.index'
                ],
                [
                    'name' => 'Danh mục',
                    'route' => 'get_admin.category.index'
                ],
                [
                    'name' => 'Giáo viên',
                    'route' => 'get_admin.teacher.index'
                ],
                [
                    'name' => 'Khoá học',
                    'route' => 'get_admin.course.index'
                ],
            ]
        ],
        [
            'name' => 'Dữ liệu nền',
            'class-icon' => 'la la-database',
            'sub' => [
                [
                    'name' => 'Slide',
                    'route' => 'get_admin.slide.index'
                ]
            ]
        ],
    ]
];
