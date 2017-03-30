<?php
class Log
{
    use loader;
    protected $i = 0;
    
    public function log( $options )
    {
        $options = array_merge( 
            array(
                'type' => 'message',
                'text' => '',
                'save' => false
            ),
            $options 
        );
        extract( $options, EXTR_PREFIX_ALL, 'o' );
        $this->set( $this->id(), $options, array( 'category' => $o_type ) );
        if( $o_save )
        {
            $this->save( $options );
        }
    }
    
    protected function id()
    {
        $this->i++;
        return $this->i;
    }
    
    protected function save( $options )
    {
        // TODO
    }
}