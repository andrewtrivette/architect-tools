<?php
class Templates {
    use loader;
    
    public function getType( $type )
    {
        return $this->listMetadata( array( 'category' => $type ) );
    }
}