<?php

return [
    'post' => [
        'filter' => [
            'title' => [
                'title' => "Title",
                'type' => 'input'
            ]
        ],
        'editor' => [
            'author' => [
                'label' => "Author",
                'type' => 'include',
                "disable" => true,
                'include' => 'dashboard-pages.custom.select_type',
                'widget' => 'select2',
                'required' => true,
            ],
            'title' => [
                'label' => "Title",
                'type' => 'include',
                'required' => true,
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'ckeditor',
            ],
            'content' => [
                'label' => "Content",
                'type' => 'include',
                'include' => 'dashboard-pages.custom.description',
                'widget' => 'ckeditor',
                'required' => true,
            ],
            'post_type' => [
                'label' => "Post type",
                'type' => 'include',
                "disable" => true,
                'include' => 'dashboard-pages.custom.select_type',
                'widget' => 'select2',
                'required' => true,
            ],
            'status' => [
                'label' => "Status",
                'type' => "select",
                'include' => 'dashboard-pages.custom.select_status_type_3',
                'variable' => 'options'
            ],
        ],
        'title' => 'Post management',
        'modal_size' => 'md',
    ],
    'product' => [
        'filter' => [
            'name' => [
                'title' => "Name",
                'type' => 'input'
            ]
        ],
        'editor' => [
            'category_id' => [
                'label' => "Category",
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_type',
                'widget' => 'select2',
                'required' => true,
            ],
            'brand_id' => [
                'label' => "Brand",
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_type',
                'widget' => 'select2',
                'required' => true,
            ],
            'name' => [
                'label' => "Name",
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'ckeditor',
                'required' => true,
            ],
            'description' => [
                'label' => "Description",
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'ckeditor',
            ],
            'price' => [
                'label' => "Price",
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'ckeditor',
            ],
            'quantity' => [
                'label' => "Quantity",
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'ckeditor',
            ],
            'status' => [
                'label' => "Status",
                'type' => "select",
                'include' => 'dashboard-pages.custom.select_status_type_2',
                'variable' => 'options'
            ],
        ],
        'title' => 'Product management',
        'modal_size' => 'md',
    ],
    'recruitment' => [
        'filter' => [
            'status' => [
                'title' => "状態",
                'type' => 'select',
                'include' => 'admin.custom.filter.select_status',
                'variable' => 'options'
            ],
        ],
        'editor' => [
            'status' => [
                'label' => "状態",
                'type' => 'include',
                'include' => 'admin.custom.select_status',
                'widget' => 'select2',
                'required' => true
            ],
        ],
        'title' => '採用情報',
        'modal_size' => 'md',
    ],
    'group_content' => [
        'filter' => [
            'title' => 'タイトル',
        ],
        'editor' => [
            'title' => [
                'label' => "タイトル",
                'type' => "input",
                'required' => true,
            ],
            'group_id' => [
                'label' => "タイプ",
                'type' => 'include',
                'include' => 'admin.custom.select_groups',
                'widget' => 'select2',
                'required' => true
            ],
            'thumbnail_image' => [
                'label' => "サムネイル ",
                'type' => 'include',
                'required' => true,
                'include' => 'admin.custom.thumbnail_image',
                'widget' => 'image',
            ],
            'image' => [
                'label' => "イメージ ",
                'type' => 'include',
                'required' => true,
                'include' => 'admin.custom.image_news',
                'widget' => 'image',
            ],
            'meta_description' => [
                'label' => "説明 概要",
                'type' => 'include',
                'col_class' => 'col-12',
                'required' => true,
                'include' => 'admin.custom.meta_description',
                'widget' => 'ckeditor',
            ],
            'description' => [
                'label' => "内容 ",
                'type' => 'include',
                'col_class' => 'col-12',
                'required' => true,
                'include' => 'admin.custom.description',
                'widget' => 'ckeditor',
            ],
            'meta_data' => [
                'label' => "仕事の詳細 ",
                'type' => 'include',
                'col_class' => 'col-12',
                'required' => true,
                'include' => 'admin.custom.meta',
                'widget' => 'meta',
            ],
        ],
        'title' => '仕事内容',
        'modal_size' => 'md',
    ],
    'performance' => [
        'filter' => [
            'name' => 'タイトル',
        ],
        'editor' => [
            'name' => [
                'label' => "タイトル",
                'type' => 'input',
                'required' => true,
            ],
            'timeline' => [
                'label' => "タイムライン",
                'type' => 'include',
                'required' => true,
                'include' => 'admin.custom.date_time_product',
                'widget' => 'date_time_picker'
            ],
            'area' => [
                'label' => "範囲 (m2)",
                'type' => "input",
                'required' => true,
            ],
            'image' => [
                'label' => "イメージ ",
                'type' => 'include',
                'required' => true,
                'include' => 'admin.custom.image_news',
                'widget' => 'image',
            ],
        ],
        'title' => '管理実績',
        'modal_size' => 'md',
    ],
    'translate' => [
        'news' => [
            'category_id' => 'Category name',
            'title' => 'Title',
            'download_url' => 'Link',
            'meta_description' => 'Meta Description',
            'description' => 'Description',
            'thumbnail_image' => 'Image',
            'status' => 'Status',
        ],
        'category_news' => [
            'name' => 'Name',
            'color_picker' => 'Color',
            'id' => 'ID',
        ],
        'button' => [
            'search' => 'Search',
            'model_new'=> 'Add new',
            'input' => 'Input',
            'select' => 'Select',
            'edit' => 'Edit',
            'delete' => 'Delete',
            'on' => 'On',
            'off' => 'Off',
            'view' => 'View',
            'image' => 'Image',
            'upload' => 'Upload',
            'add' => 'Insert',
            'update' => 'Update',
            'save' => 'Public',
            'delete-data' => 'Reset default',
            'save-draft' => 'Save draft',
            'preview' => 'Preview',
            'confirm-delete' => 'Do you want to delete this record?',
            'cancel' => 'Cancel',
            'action' => 'Action',
        ],
        'label' => [
            'description' => 'Description',
            'all' => 'All',
            'public' => 'Public',
            'draft' => 'Draft',
            'edit_image' => 'Edit image',
        ],
    ]
];
