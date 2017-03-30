<?php
$Templates->set( 'home', function( $args )
{
    return '<input type="text" value="'.$args['value'].'" name="'.$args['name'].'" class="'.$args['class'].'">';
}, 
array( 'category' => 'element' ) 
);