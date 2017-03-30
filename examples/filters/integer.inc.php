<?php
$Filters->set( 'integer', function( $args )
{
    return (int) $args['value'];
});