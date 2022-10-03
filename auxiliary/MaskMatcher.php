<?php
class MaskMatcher {
    public static function Is_Match($mask, $serial_number): bool {
        return preg_match(self::create_pattern($mask), $serial_number) 
                && mb_strlen($mask) === mb_strlen($serial_number);
    }
    
    private static $masks = 
            array('N' => '[\d]', 'A' => '[A-Z]', 'a' => '[a-z]'
                , 'X' => '[\dA-Z]', 'Z' => '[-_@]');

    private static function create_pattern($mask) {
        $pattern = '/';
        
        for ($i = 0; $i < mb_strlen($mask); $i++)
        {
            $pattern = $pattern . self::$masks[$mask[$i]];
        }        
        $pattern = $pattern . '/';
        
        return $pattern;
    }
}
