<?php
return [
    'module' => [
        [
            'title' => 'QL Nhóm thành viên',
            'icon' => 'fa fa-user',
            'name'=>'user',
            'subModule' => [
                [
                    'title' => 'Ql nhóm thành viên',
                    'route' => '/user/catalogue/index'
                ],
                [
                    'title' => 'Ql thành viên',
                    'route' => '/user/index' 
                ]
            ]
        ],
        [
            'title' => 'QL Bài viết',
            'icon' => 'fa fa-user',
            'name'=>'post',
            'subModule' => [
                [
                    'title' => 'Ql nhóm bài viết',
                    'route' => 'post/catalogue/index' 
                ],
                [
                    'title' => 'Ql bài viết',
                    'route' => 'post/index' 
                ]
            ]
        ]
    ],
];
