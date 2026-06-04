<?php

function dpsm_get_navigation(): array
{
    return require get_template_directory()
        . '/inc/config/navigation.php';
}
