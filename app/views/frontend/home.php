<?php
echo View::make('frontend.sections.head');
echo View::make('frontend.sections.upper');
?>

<div class="container">
    
    <div class="row">

        <div class="col-lg-12 col-centered">

            <div id="hangman_feedback">
                <img src="assets/img/hangman_steps/0.png" data-failures="0">
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-lg-12 col-centered">
            
            <div id="game_word">
                <?php
                // loop through all of the currently selected
                for ($i = 0; $i < strlen($game_word); $i++) {
                    ?>
                    <span class="letter" data-letter_pos="<?= $i; ?>">&nbsp;</span>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    
    <hr>

    <div class="row">
        <div class="col-lg-12 col-centered">
            
            <!--
            inserting HTMl into the DOM is just plain nasty, therefore we'll always have these
            elements in the source code and will just "display" them when the
            criteria has been met
            -->
            <div id="game_complete" class="alert alert-success">
               Well done, You saved hangman from a nasty demise! click <a href="">here</a> to save another.
            </div>
            <div id="game_over" class="alert alert-danger">
                Unfortunately hangman is now in heaven, click <a href="">here</a> to try again.
            </div>
            
            <div id="character_selection">
                <?php
                foreach ($alphabet as $character) {
                    ?>
                    <span class="letter">
                        <a href="api/guess/<?=$character;?>/<?=$game_word_enc;?>"><?= $character; ?></a>
                    </span>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    echo View::make('frontend.sections.footer');
    ?>
