<?php

function dpsm_get_quick_links(
    string $group
): array {

    static $quick_links = null;

    if ($quick_links === null) {

        $quick_links = require
            DPSM_THEME_DIR .
            '/inc/config/quick-links.php';
    }

    return $quick_links[$group] ?? [];
}
