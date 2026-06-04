<?php

if (!defined('ABSPATH')) {
    exit;
}

$departments = require __DIR__ . '/departments.php';

return [

    'primary' => [

        [
            'label' => 'Home',
            'path'  => '/',
            'icon'  => 'home',
        ],

        [
            'label' => 'Departments',
            'type'  => 'dropdown',
            'icon'  => 'building-office',
            'items' => $departments,
        ],

        [
            'label' => 'News',
            'path'  => '/news',
            'icon'  => 'newspaper',
        ],

        [
            'label' => 'Projects',
            'path'  => '/projects',
            'icon'  => 'folder',
        ],

        [
            'label' => 'Resources',
            'path'  => '/resources',
            'icon'  => 'document-text',
        ],

        [
            'label' => 'Staff Directory',
            'path'  => '/staff-directory',
            'icon'  => 'users',
        ],

        [
            'label' => 'Media',
            'path'  => '/media',
            'icon'  => 'photo',
        ],

        [
            'label' => 'Contact',
            'path'  => '/contact-us',
            'icon'  => 'envelope',
        ],

    ],

];
