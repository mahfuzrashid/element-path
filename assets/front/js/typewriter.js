(function($, elementor) {
    'use strict';
    var widgetTypewriter = function($scope, $) {
        let headLineWrapper = $('.cd-headline.letters'),
            headline = $('.cd-headline'),
            animationDelay = 6000,
            barAnimationDelay = 5800,
            barWaiting = barAnimationDelay - 5000, //3000 is the duration of the transition on the loading bar - set in the scss/css file
            //letters effect
            lettersDelay = 50,
            //type effect
            typeLettersDelay = 150,
            selectionDuration = 500,
            typeAnimationDelay = selectionDuration + 800,
            //clip effect
            revealDuration = 600,
            revealAnimationDelay = 3000;


        initHeadline();


        function initHeadline() {
            singleLetters(headLineWrapper.find('span'));
            animateHeadline(headline);
        }

        function singleLetters($words) {
            $words.each(function () {
                var word = $(this),
                    letters = word.text().split(''),
                    selected = word.hasClass('is-visible');
                for (i in letters) {
                    if (word.parents('.rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
                    letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>' : '<i>' + letters[i] + '</i>';
                }
                var newLetters = letters.join('');
                word.html(newLetters).css('opacity', 1);
            });
        }

        function animateHeadline($headlines) {
            var duration = animationDelay;
            $headlines.each(function () {
                var headline = $(this);

                if (headline.hasClass('loading-bar')) {
                    duration = barAnimationDelay;
                    setTimeout(function () {
                        headline.find('.cd-words-wrapper').addClass('is-loading')
                    }, barWaiting);
                } else if (headline.hasClass('clip')) {
                    var spanWrapper = headline.find('.cd-words-wrapper'),
                        newWidth = spanWrapper.width() + 200
                    spanWrapper.css('width', newWidth);
                } else if (!headline.hasClass('type')) {
                    //assign to .cd-words-wrapper the width of its longest word
                    var words = headline.find('.cd-words-wrapper span'),
                        width = 0;
                    words.each(function () {
                        var wordWidth = $(this).width();
                        if (wordWidth > width) width = wordWidth;
                    });
                    headline.find('.cd-words-wrapper').css('width', width);
                }
                //trigger animation
                setTimeout(function () {
                    hideWord(headline.find('.is-visible').eq(0))
                }, duration);
            });
        }

        function hideWord($word) {
            var nextWord = takeNext($word);

            if ($word.parents('.cd-headline').hasClass('type')) {
                var parentSpan = $word.parent('.cd-words-wrapper');
                parentSpan.addClass('selected').removeClass('waiting');
                setTimeout(function () {
                    parentSpan.removeClass('selected');
                    $word.removeClass('is-visible').addClass('is-hidden').children('span').removeClass('is-visible').addClass('is-hidden');
                }, selectionDuration);
                setTimeout(function () {
                    showWord(nextWord, typeLettersDelay)
                }, typeAnimationDelay);

            } else if ($word.parents('.cd-headline').hasClass('letters')) {
                var bool = ($word.children('span').length >= nextWord.children('span').length) ? true : false;
                hideLetter($word.find('span').eq(0), $word, bool, lettersDelay);
                showLetter(nextWord.find('span').eq(0), nextWord, bool, lettersDelay);

            } else if ($word.parents('.cd-headline').hasClass('clip')) {
                $word.parents('.cd-words-wrapper').animate({width: '2px'}, revealDuration, function () {
                    switchWord($word, nextWord);
                    showWord(nextWord);
                });

            } else if ($word.parents('.cd-headline').hasClass('loading-bar')) {
                $word.parents('.cd-words-wrapper').removeClass('is-loading');
                switchWord($word, nextWord);
                setTimeout(function () {
                    hideWord(nextWord)
                }, barAnimationDelay);
                setTimeout(function () {
                    $word.parents('.cd-words-wrapper').addClass('is-loading')
                }, barWaiting);

            } else {
                switchWord($word, nextWord);
                setTimeout(function () {
                    hideWord(nextWord)
                }, animationDelay);
            }
        }

        function showWord($word, $duration) {
            if ($word.parents('.cd-headline').hasClass('type')) {
                showLetter($word.find('span').eq(0), $word, false, $duration);
                $word.addClass('is-visible').removeClass('is-hidden');

            } else if ($word.parents('.cd-headline').hasClass('clip')) {
                $word.parents('.cd-words-wrapper').animate({'width': $word.width() + 10}, revealDuration, function () {
                    setTimeout(function () {
                        hideWord($word)
                    }, revealAnimationDelay);
                });
            }
        }

        function hideLetter($letter, $word, $bool, $duration) {
            $letter.removeClass('is-visible').addClass('is-hidden');

            if (!$letter.is(':last-child')) {
                setTimeout(function () {
                    hideLetter($letter.next(), $word, $bool, $duration);
                }, $duration);
            } else if ($bool) {
                setTimeout(function () {
                    hideWord(takeNext($word))
                }, animationDelay);
            }

            if ($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
                var nextWord = takeNext($word);
                switchWord($word, nextWord);
            }
        }

        function showLetter($letter, $word, $bool, $duration) {
            $letter.addClass('is-visible').removeClass('is-hidden');

            if (!$letter.is(':last-child')) {
                setTimeout(function () {
                    showLetter($letter.next(), $word, $bool, $duration);
                }, $duration);
            } else {
                if ($word.parents('.cd-headline').hasClass('type')) {
                    setTimeout(function () {
                        $word.parents('.cd-words-wrapper').addClass('waiting');
                    }, 100);
                }
                if (!$bool) {
                    setTimeout(function () {
                        hideWord($word)
                    }, animationDelay)
                }
            }
        }

        function takeNext($word) {
            return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
        }

        function takePrev($word) {
            return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
        }

        function switchWord($oldWord, $newWord) {
            $oldWord.removeClass('is-visible').addClass('is-hidden');
            $newWord.removeClass('is-hidden').addClass('is-visible');

            $('.cd-words-wrapper').removeClass('cur-0 cur-1 cur-2').addClass($newWord.data('cursor'));
        }

        $('.cd-words-wrapper span:first-child').addClass( 'is-visible' );


        $(window).on('load', function () {
            $('.cd-words-wrapper').addClass('cur-0');
        });

    };


    jQuery(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/elmpath-typewriter.default', widgetTypewriter);
    });

}(jQuery, window.elementorFrontend));
