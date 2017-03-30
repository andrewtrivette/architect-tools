<?php
$Filters->set( 'alpha', function( $args )
{
    return preg_replace( '/[^a-zA-Z]/', '', $args['value'] );
});