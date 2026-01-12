<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <!-- Header with main menu -->
    <header>
        <div class="logotype">
            <a href="<?= get_home_url(); ?>">
                <!-- Display custom logo with page title as fallback -->
                <?php
                if (function_exists('the_custom_logo') && has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                }
                ?>
            </a>
        </div>
        <!-- The main menu -->
        <nav class="main-menu" id="main-menu">
            <?php wp_nav_menu(array('theme_location' => 'main-nav')); ?>
        </nav>
        <!-- Hamburger icon -->
        <div class="hamburger-icon" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </header>
    <!-- Overlay -->
    <div id="overlay" class="overlay" onclick="toggleMenu()"></div>