<?php

return [
    'post' => [
        'filter' => [
            'title' => [
                'title' => 'Title',
                'type' => 'input',
                'include' => 'dashboard-pages.custom.input',
            ]
        ],
        'editor' => [
            'author' => [
                'label' => 'Author',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_type',
                'widget' => 'select2',
                'required' => true,
            ],
            'title' => [
                'label' => 'Title',
                'type' => 'include',
                'required' => true,
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'ckeditor',
            ],
            'content' => [
                'label' => 'Content',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.description',
                'widget' => 'ckeditor',
                'required' => true,
            ],
            'post_type' => [
                'label' => 'Post type',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_type',
                'widget' => 'select2',
                'required' => true,
                'variable' => 'option2'
            ],
            'status' => [
                'label' => 'Status',
                'type' => 'select',
                'include' => 'dashboard-pages.custom.select_status_type_3',
                'variable' => 'option1'
            ],
        ],
        'title' => 'Post management',
        'modal_size' => 'md',
    ],
    'product' => [
        'filter' => [
            'name' => [
                'title' => 'Name',
                'type' => 'input',
                'include' => 'dashboard-pages.custom.input',
            ]
        ],
        'editor' => [
            'category_id' => [
                'label' => 'Category',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_type',
                'widget' => 'select2',
                'required' => true,
            ],
            'brand_id' => [
                'label' => 'Brand',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_type',
                'widget' => 'select2',
                'required' => true,
            ],
            'name' => [
                'label' => 'Name',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'ckeditor',
                'required' => true,
            ],
            'description' => [
                'label' => 'Description',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'ckeditor',
            ],
            'price' => [
                'label' => 'Price',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'ckeditor',
            ],
            'quantity' => [
                'label' => 'Quantity',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'ckeditor',
            ],
            'status' => [
                'label' => 'Status',
                'type' => 'select',
                'include' => 'dashboard-pages.custom.select_status_type_2',
                'variable' => 'options'
            ],
        ],
        'title' => 'Product management',
        'modal_size' => 'md',
    ],
    'product_category' => [
        'filter' => [
            'name' => [
                'title' => 'Name',
                'type' => 'data',
            ],
        ],
        'editor' => [
            'name' => [
                'title' => 'Name',
                'type' => 'data',
                'include' => 'dashboard-pages.custom.input',
                'required' => true
            ],
            'status' => [
                'label' => 'Status',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_status_type_1',
                'widget' => 'select2',
                'required' => true,
                'variable' => 'options'
            ],
        ],
        'title' => 'Product category management',
        'modal_size' => 'md',
    ],
    'brand' => [
        'filter' => [
            'name' => [
                'title' => 'Name',
                'type' => 'data',
            ],
        ],
        'editor' => [
            'name' => [
                'title' => 'Name',
                'type' => 'data',
                'include' => 'dashboard-pages.custom.input',
                'required' => true
            ],
            'status' => [
                'label' => 'Status',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_status_type_1',
                'widget' => 'select2',
                'required' => true,
                'variable' => 'options'
            ],
        ],
        'title' => 'Brand management',
        'modal_size' => 'md',
    ],
    'order' => [
        'filter' => [
            'name' => [
                'title' => 'Customer',
                'type' => 'data'
            ],
            'phone_number' => [
                'title' => 'Phone Number',
                'type' => 'data'
            ],
            'status' => [
                'title' => 'Status',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_status_type_1',
                'widget' => 'select2'
            ]
        ],
        'editor' => [
            'name' => [
                'label' => 'Customer',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2',
                'required' => true
            ],
            'email' => [
                'label' => 'Email',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2',
                'required' => true
            ],
            'address' => [
                'label' => 'Address',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2',
                'required' => true
            ],
            'phone_number' => [
                'label' => 'Phone Number',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2',
                'required' => true
            ],
            'notice' => [
                'label' => 'Notice',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.description',
                'widget' => 'ckeditor',
            ],
            'total' => [
                'label' => 'Total price',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'ckeditor',
                'required' => true,
            ],
            'status' => [
                'label' => 'Status',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_status_type_1',
                'widget' => 'select2',
                'required' => true,
                'variable' => 'options'
            ],
        ],
        'title' => 'Order management',
        'modal_size' => 'md',
    ],
    'shipping' => [
        'filter' => [
            'shipping_code' => [
                'title' => 'Shipping Code',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2'
            ],
            'manager' => [
                'title' => 'Manager',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input'
            ],
            'customer_name' => [
                'title' => 'Customer',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input'
            ],
            'shipping_delivery_time' => [
                'title' => 'Delivery Time',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.datetime',
                'widget' => 'date_time_picker'
            ]
        ],
        'editor' => [
            'delivery_id' => [
                'label' => 'Delivery method',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_type',
                'widget' => 'select2',
                'required' => true,
                'variable' => 'option2'
            ],
            'manager' => [
                'label' => 'Manager',
                'type' => 'include',
                'required' => true,
                'include' => 'dashboard-pages.custom.select_type',
                'widget' => 'select2',
                'variable' => 'option1'
            ],
            'shipping_code' => [
                'label' => 'Shipping Code',
                'type' => 'include',
                'required' => true,
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select'
            ],
            'customer_name' => [
                'label' => 'Customer',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_type',
                'required' => true,
                'disabled' => true
            ],
            'shipping_delivery_address' => [
                'label' => 'Shipping Address',
                'type' => 'include',
                'required' => true,
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2'
            ],
            'phone_number' => [
                'label' => 'Phone Number',
                'type' => 'include',
                'required' => true,
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2'
            ],
            'shipping_delivery_time' => [
                'label' => 'Shipping time',
                'type' => 'include',
                'required' => true,
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2'
            ],
            'status' => [
                'label' => 'Status',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_status_type_4',
                'widget' => 'select2',
                'required' => true,
                'variable' => 'option3'
            ],
        ],
        'title' => 'Shipping management',
        'modal_size' => 'md',
    ],
    'delivery' => [
        'filter' => [
            'service_name' => [
                'title' => 'Service name',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2'
            ],
        ],
        'editor' => [
            'creator' => [
                'label' => 'Creator',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_type',
                'widget' => 'select2',
                'required' => true,
                'variable' => 'option1',
                'disabled' => true

            ],
            'payment_option_id' => [
                'label' => 'Payment option',
                'type' => 'include',
                'required' => true,
                'include' => 'dashboard-pages.custom.select_type',
                'widget' => 'select2',
                'variable' => 'option2'
            ],
            'service_name' => [
                'label' => 'Service name',
                'type' => 'include',
                'required' => true,
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select'
            ],
            'delivery_fee' => [
                'label' => 'Delivery fee',
                'type' => 'include',
                'required' => true,
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select'

            ],
            'description' => [
                'label' => 'Description',
                'type' => 'include',
                'required' => true,
                'include' => 'dashboard-pages.custom.description',
                'widget' => 'ckeditor',
            ],
        ],
        'title' => 'Delivery management',
        'modal_size' => 'md',
    ],
    'comment' => [
        'filter' => [
            'service_name' => [
                'title' => 'content',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2'
            ],
            'comment_type' => [
                'title' => 'Type',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_type_1',
                'widget' => 'select2'
            ],
        ],
        'editor' => [
            'reference_id' => [
                'label' => 'Name',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2',
                'disabled' => true
            ],
            'customer_id' => [
                'label' => 'Creator',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2',
                'disabled' => true
            ],
            'content' => [
                'label' => 'Content',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.description',
                'widget' => 'ckeditor',
                'disabled' => true
            ],
        ],
        'title' => 'Comment management',
        'modal_size' => 'md',
    ],
    'image' => [
        'filter' => [
            'image_type' => [
                'title' => 'Type',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_type_1',
                'widget' => 'select2',
            ],
        ],
        'editor' => [
            'reference_id' => [
                'label' => 'Name',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2',
                'disabled' => true
            ],
            'url' => [
                'label' => 'Creator',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2',
                'disabled' => true
            ],
            'sort_no' => [
                'label' => 'Content',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.description',
                'widget' => 'ckeditor',
                'disabled' => true
            ],
        ],
        'title' => 'Image management',
        'modal_size' => 'md',
    ],
    'tag' => [
        'filter' => [
            'name' => [
                'title' => 'Tag name',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2'
            ],
            'tag_type' => [
                'title' => 'Type',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.select_type_1',
                'widget' => 'select2'
            ],
        ],
        'editor' => [
            'reference_id' => [
                'label' => 'Name',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2',
                'disabled' => true
            ],
            'creator' => [
                'label' => 'Creator',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2',
                'disabled' => true
            ],
            'name' => [
                'label' => 'Creator',
                'type' => 'include',
                'include' => 'dashboard-pages.custom.input',
                'widget' => 'select2',
                'required' => true
            ],
        ],
        'title' => 'Tag management',
        'modal_size' => 'md',
    ],

    'translate' => [
        'news' => [
            'category_id' => '',
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
