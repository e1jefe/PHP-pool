<?php
Class Color {
    public $red = 0;
    public $green = 0;
    public $blue = 0;
    public static $verbose = FALSE;
    function __construct( array $args ) {
        if ( array_key_exists( 'rgb', $args ) ) {
            $this->red = ( $args['rgb'] >> 16 ) & 0xff;
            $this->green = ( $args['rgb'] >> 8 ) & 0xff;
            $this->blue = $args['rgb'] & 0xff ;
        }
        else {
            if ( array_key_exists( 'red', $args ) )
                $this->red = (int) $args['red'];
            else
                $this->red = 0;
            if ( array_key_exists( 'green', $args ) )
                $this->green = (int) $args['green'];
            else
                $this->green = 0;
            if ( array_key_exists( 'blue', $args ) )
                $this->blue = (int) $args['blue'];
            else
                $this->blue = 0;
        }
        if (self::$verbose)
            print( $this . ' constructed.' . PHP_EOL );
        return;
    }
    function __destruct() {
        if (self::$verbose)
            print($this . ' destructed.' . PHP_EOL );
        return;
    }
    function __toString() {
        return sprintf( "Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
    }
    static function doc() {
        return file_get_contents ( "Color.doc.txt" );
    }
    function add( Color $rhs) {
        return new Color( array( 'red' => $this->red + $rhs->red, 'green' => $this->green + $rhs->green, 'blue' => $this->blue + $rhs->blue ) );
    }
    function sub( Color $rhs) {
        return new Color( array( 'red' => $this->red - $rhs->red, 'green' => $this->green - $rhs->green, 'blue' => $this->blue - $rhs->blue ) );
    }
    function mult( $f) {
        return new Color( array( 'red' => $this->red * $f, 'green' => $this->green * $f, 'blue' => $this->blue * $f ) );
    }
}
?>