<?php

class HomeController extends BaseController {
    

    public function index() {
        // what word are we initialising the system with?
        $game_word = Word::getRandom(); 
        
        return View::make('frontend.home', array(
            'alphabet'  => range('A', 'Z'),
            'game_word'      => $game_word,
            'game_word_enc'  => Crypt::encrypt($game_word)
        ));
    }

}
