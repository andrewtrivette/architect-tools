<?php
// Load classes
foreach( glob( dirname(__FILE__).'/../classes/*.php' ) as $filename )
{
	include $filename;
	$name = basename( $filename, '.php' );
	${$name} = new $name();
}
// Load registered objects
$folders = array( 'elements', 'filters', 'modules' );
foreach( $folders as $folder )
{
    foreach( glob( dirname(__FILE__).'/'.$folder.'/*.inc.php' ) as $filename )
    {
    	include $filename;
    }
}

