<?php

class WordController extends BaseController {

    /**
     * @access public
     * @param varchar $letter   one character string to check for existance of
     * @return array            array containing positions for the letter
     * @return bool             returns false on not found
     * 
     */
    public function guessLetter($letter, $word_enc) {
        $positions = array();
        // lets decrypt the word
        $word = Crypt::decrypt($word_enc);
        // theres a few different ways of accomplishing finding what positions
        // the guessed character is it, for simplicity we are just going to loop
        // through each character in the full word and check if it is the same
        $positions = Word::getCharacterPositions($letter, $word);
        return Response::json($positions)->header('Content-Type', 'application/json');
    }
    

}
