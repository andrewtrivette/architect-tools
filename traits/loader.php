<?php
trait loader {
    protected $data = array();
    protected $metadata = array();
    
    public function set( $key, $value, $metadata = array() )
    {
        $this->data[$key] = $value;
        $this->setMetadata( $key, $value, $metadata );
    }
    
    public function setMetadata( $key, $value, $metadata = array() )
    {
        $this->metadata[$key] = array_merge( array(
            'type' => gettype( $value ),
            'isFunction' => is_callable( $value )
        ), $metadata );
    }
    
    public function get( $key )
    {
        if( $this->keyExists( $key ) )
        {
            return $this->data[$key];
        }
        return null;
    }
    
    public function getMetadata( $key, $filter = false )
    {
        if( array_key_exists( $key, $this->metadata ) )
        {
            if( $filter != false 
                && array_key_exists( $filter, $this->metadata[$key] ) )
            {
                return $this->metadata[$key][$filter];
            }
            return $this->metadata[$key];
        }
        return null;
    }
    
    public function execute( $key, $args = null )
    {
        $value = $this->get( $key );
        $isFunction = $this->getMetadata( $key, 'isFunction' );
        if( $isFunction )
        {
            return ( !$args ) ? $value() : $value( $args );
        }
        return null;
    }
    
    public function keyExists( $key )
    {
        return array_key_exists( $key, $this->data );
    }
    
    public function listMetadata( $filter = false )
    {
        if( $filter && is_array( $filter ) )
        {
            $list = array();
            foreach( $this->metadata as $key => $metadata )
            {
                $match = array_intersect_assoc( $metadata, $filter );
                if( count( $match ) != 0 )
                {
                    $list[$key] = $metadata;
                }
            }
            return $list;
        }
        return $this->metadata;
    }
    
}