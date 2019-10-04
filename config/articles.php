<?php

use App\User;

return [

    /*
     | Public path
     */

    'public_path' => 'articles',

    /*
     | Admin path
     */

    'admin_path' => 'admin/articles',

    /*
     | Author class
     */
    'author' => User::class,

    /*
     | Custom header view
     */
    'header_view' => 'articles::header',

    /*
     |
     */
    'header_label' => 'Articles',

    /**
     * Custom css
     */
    'custom_css' => false,

];
