/*
 * define some core functions that keep it DRY
 */

// this function is called when a letter has been attempted that is not
// in the game word, it will look at the current fail count, increment by 1
// and change the hangman image when applicable
function processInvalidAttempt() {
    var hangman_img = $('div#hangman_feedback img');
    // lets first get what failure level we're currently on
    var initial_failures = parseInt(hangman_img.data('failures'));
    var new_failure_count = initial_failures + 1;
    // we should incrememnt this number unless we're already at the max
    if (new_failure_count < 6) {
        hangman_img.attr('src', 'assets/img/hangman_steps/' + new_failure_count + '.png');
        // set the failure count to the new level
        hangman_img.data('failures', new_failure_count);
    } else {
        // the player has attempted a word and the maximum number of allowed
        // failures have been reached
        hangman_img.attr('src', 'assets/img/hangman_steps/6.png');
        gameOver();
    }
}

function processValidAttempt(letter, positions) {
    for (index = 0; index < positions.length; ++index) {
        $('div#game_word span[data-letter_pos="' + positions[index] + '"]').text(letter);
    }
    // now lets see if all of the letters have been guessed
    // and we can mark the game as complete
    if (checkGameComplete()) {
        gameComplete();
    }
}

// activated when youve exceeded the maximium number of invalid
// letter attempts
function gameOver() {
    $('div#character_selection').hide();
    $('div#game_over').show();
}

// activated when every letter has been guessed
function gameComplete() {
    $('div#character_selection').hide();
    $('div#game_complete').show();
}

// check on every valid letter attempt that the game is now complete
function checkGameComplete() {
    var is_complete = true;
    $('div#game_word span.letter').each(function (index) {
        var html = $(this).html();
        if (html === '&nbsp;') {
            is_complete = false;
        }
    });
    return is_complete;
}

$(function () {

    ajax_startpoint = 'http://keyword-tracker.co.uk/hangman/public/index.php/';

    $('div#character_selection span.letter a').click(function (e) {
        e.preventDefault();
        var selected_letter_obj = $(this);
        var selected_letter = selected_letter_obj.text();
        var target_page = selected_letter_obj.attr('href');
        var ajax_url = ajax_startpoint + target_page;
        $.ajax({
            url: ajax_url,
            success: function (response) {
                if (response) {
                    processValidAttempt(selected_letter, response);
                } else {
                    processInvalidAttempt();
                }
                // we always need to hide the selected letter whether it
                // was a valid attempt or not
                selected_letter_obj.parent().addClass('invisible');

            }
        });
    });
});