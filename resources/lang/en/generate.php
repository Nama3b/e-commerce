<?php

return [
    'post' => [
        'filter' => [
            'type' => [
                'title' => "Title",
            ]
        ],
        'editor' => [
            'title' => [
                'label' => "Title",
                'type' => 'include',
                'col_class' => 'col-12',
                'required' => true,
                'include' => 'admin.custom.title',
                'widget' => 'ckeditor',
            ],
            'title_mobile' => [
                'label' => "",
                'type' => 'include',
                'col_class' => 'col-12',
                'required' => true,
                'include' => 'admin.custom.title_mobile',
                'widget' => 'ckeditor',
            ],
            'type' => [
                'label' => "タイプ",
                'type' => 'include',
                "disable" => true,
                'include' => 'admin.custom.select_group_type',
                'widget' => 'select2',
                'required' => true,
            ],
            'position' => [
                'label' => "",
                'type' => "input",
            ],
            'image' => [
                'label' => "Thumbnail Image",
                'type' => 'include',
                'required' => true,
                'include' => 'admin.custom.image_news',
                'widget' => 'image',
            ],
        ],
        'title' => 'Post management',
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
        'group_home' => [
            'title' => 'タイトル',
            'title_mobile' => 'タイトル モバイル',
            'description' => '内容',
            'image' => 'イメージ ',
            'type' => 'タイプ',
        ],
        'group_content' => [
            'job_id' => '仕事',
            'description' => '内容',
            'meta_description' => '説明 概要',
            'url' => 'リンク ',
            'working_place' => '勤務先',
            'address' => '勤務地',
            'salary' => '給与',
            'working_time' => '時間',
            'qualification' => '資格',
            'welfare' => '待遇',
            'status' => '雇用形態',
            'meta_data' => '仕事の詳細',
        ],
        'recruitment' => [
            'content' => '内容',
            'user_name' => 'お名前',
            'furigana' => 'フリガナ',
            'address' => 'ご住所',
            'user_number' => '電話番号',
            'age' => '年齢',
            'gender' => '性別',
            'qualification' => '資格',
            'email' => 'メールアドレス',
            'zip_code' => '郵便番号',
        ],
        'performance' => [
            'timeline' => 'タイムライン',
            'area' => '範囲',
        ],
        'news' => [
            'category_id' => 'カテゴリー名 ',
            'title' => 'タイトル ',
            'download_url' => 'リンク ',
            'meta_description' => '記事の要約',
            'description' => '記事内容 ',
            'thumbnail_image' => 'イメージ ',
            'status' => '状態',
        ],
        'category_news' => [
            'name' => 'カテゴリー名',
            'color_picker' => 'カタログ色',
            'id' => ' コード',
        ],
        'button' => [
            'search' => '検索',
            'model_new' => '新規追加',
            'input' => '入力',
            'select' => '選択',
            'edit' => '編集',
            'delete' => '削除',
            'on' => 'オン',
            'off' => 'オフ',
            'view' => 'ビュー',
            'image' => 'イメージ',
            'upload' => 'アップロード',
            'add' => '新規投稿',
            'update' => '編集',
            'save' => '公開',
            'delete-data' => '全てをリセット',
            'save-draft' => '下書き保存',
            'preview' => 'プレビュー',
            'confirm-delete' => 'このレコードを削除しますか？',
            'confirm-delete-multi' => 'レコードを削除しますか？',
            'cancel' => 'キャンセル',
            'action' => 'アクション',
            'id' => 'コード',
        ],
        'label' => [
            'description' => '記事内容',
            'all' => 'すべて',
            'public' => '公開済み',
            'draft' => '下書き',
            'edit_image' => '表紙画像を編集',
        ],
    ]
];
