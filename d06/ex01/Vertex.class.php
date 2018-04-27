<?php

require_once '../ex00/Color.class.php';
Class Vertex {
    private $_x = 0.0;
    private $_y = 0.0;
    private $_z = 0.0;
    private $_w = 1.0;
    private $_color = 0;
    public static $verbose = FALSE;
    function getX() { return $this->_x; }
    function getY() { return $this->_y; }
    function getZ() { return $this->_z; }
    function getW() { return $this->_w; }
    function getColor() { return $this->_color; }
    function setX( $x ) { $this->_x = $x; }
    function setY( $y ) { $this->_y = $y; }
    function setZ( $z ) { $this->_z = $z; }
    function setW( $w ) { $this->_w = $w; }
    function setColor( Color $color ) { $this->_color = $color; }
    function __construct( array $args ) {
        $this->_x = $args['x'];
        $this->_y = $args['y'];
        $this->_z = $args['z'];
        if ( array_key_exists( 'w', $args ) )
            $this->_w = $args['w'];
        else
            $this->_w = 1.0;
        if ( array_key_exists( 'color', $args ) )
            $this->_color = $args['color'];
        else
            $this->_color = new Color( array( 'red' => 255, 'green' => 255, 'blue' => 255 ) );
        if (self::$verbose)
            print($this . ' constructed' . PHP_EOL );
        return;
    }
    function __destruct() {
        if (self::$verbose)
            print($this . ' destructed' . PHP_EOL );
        return;
    }
    function __toString() {
        $string = sprintf( "Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f", $this->_x, $this->_y, $this->_z, $this->_w );
        if (self::$verbose)
            $string .= ', '.sprintf($this->_color).' )';
        else
            $string .= ' )';
        return ($string);
    }
    static function doc() {
        return file_get_contents ( 'Vertex.doc.txt' );
    }
}

?>