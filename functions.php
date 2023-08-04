<?php

function after_setup_theme_actions()
{
  // Enqueue base scripts and styles
  require_once('library/register-enqueue.php');
  // Custom types
  require_once('library/custom-post-type.php');
  // Custom sidebars
  require_once('library/custom-sidebars.php');
  // Custom menus
  require_once('library/custom-menus.php');
  // Remove sections and features
  require_once('library/remove.php');
  // Polylang translations
  // require_once('library/polylang-translations.php');
  // Add gsap
  require_once('library/gsap.php');
  // Add post thumbnails
  add_theme_support( 'post-thumbnails' );
} 
add_action('after_setup_theme', 'after_setup_theme_actions');
