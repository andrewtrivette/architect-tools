<?php
$Filters->set( 'float', function( $args )
{
    return (double) $args['value'];
});