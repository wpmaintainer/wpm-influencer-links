<?php
if ( \defined( 'WPM_LL_DEVELOPER' ) ) 
{
    \add_filter( 'acf/settings/save_json', function( $path ){
        $path = WPM_ACF_SAVE_PATH;
        return $path;
    });
}

\add_filter( 'acf/settings/load_json', function( $paths ){
    $paths[] = WPM_ACF_SAVE_PATH;
    return $paths;
});