<?php

define('DIST_DEF', 'build');

define('DIST_URI', get_template_directory_uri() . '/' . DIST_DEF);
define('DIST_PATH', get_template_directory() . '/' . DIST_DEF);

define('JS_DEPENDENCY', array());
define('JS_LOAD_IN_FOOTER', true);

define('VITE_SERVER', 'http://localhost:3000');
define('VITE_ENTRY_POINT', '/index.js');

add_action( 'wp_enqueue_scripts', function() {
    $manifest = json_decode( file_get_contents( DIST_PATH . '/manifest.json'), true );
      
    if (is_array($manifest) && array_keys($manifest)) {
        foreach($manifest as $file) {
          if(explode('.', $file['file'])[1] == "css") {
            wp_enqueue_style( 'main', DIST_URI . '/' . $file['file'] );
          } else if(explode('.', $file['file'])[1] == "js") {
            wp_enqueue_script( 'main', DIST_URI . '/' . $file['file'], JS_DEPENDENCY, '', JS_LOAD_IN_FOOTER );
          }
        }
    }
});

?>
