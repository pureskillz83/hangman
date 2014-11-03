<?php

class Word extends Eloquent {

    
    public static function getRandom() {
        $dictionary = Config::get('app.word_list');
        // we'll just do a really simple "randomise" function
        // it wont pass any gambling certification but for a simple
        // task its acceptable
        shuffle($dictionary);
        $rand_key = array_rand($dictionary);
        return $dictionary[$rand_key];
    }
    
    public static function getCharacterPositions($char, $word) {
        for ($i = 0; $i < strlen($word); $i++) {
            if (strtolower($word[$i]) == strtolower($char)) {
                $positions[] = $i;
            }
        }
        return (!empty($positions)) ? $positions : false;
    }

}
