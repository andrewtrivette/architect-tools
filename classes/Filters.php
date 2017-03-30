<?php
class Filter
{
    use loader;
    public function filter( $value, $filter, $default = false )
    {
        $result = $this->execute( $filter, array( 'filter' => $filter ) );
        if( $result === false )
        {
            return $default;
        }
        return $result;
    }
    
    public function isFiltered( $value, $filter, $strict = false )
    {
        $result = $this->filter( $value, $filter );
        if( $strict === true )
        {
            return ( $value === $result );
        }
        return ( $value == $result );
    }
}