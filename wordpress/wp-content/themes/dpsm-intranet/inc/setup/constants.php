<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('DPSM_THEME_DIR')) {

    define(
        'DPSM_THEME_DIR',
        get_template_directory()
    );
}

if (!defined('DPSM_THEME_URI')) {

    define(
        'DPSM_THEME_URI',
        get_template_directory_uri()
    );
}

if (!defined('DPSM_THEME_VERSION')) {

    define(
        'DPSM_THEME_VERSION',
        wp_get_theme()->get('Version')
    );
}
