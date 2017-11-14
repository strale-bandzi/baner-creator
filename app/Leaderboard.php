<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as Image;


class Leaderboard extends Model
{
    /**
     * function adds main txt
     */

    public function addText($x, $y, $banertext, $txtColor, $pos)
    {

        if (empty($banertext)) {
            return Image::canvas(728, 90);
        }

        if ($pos == 'leaderboard-car') {

            /**
             * leaderboard-car banner type
             */

            $tX = 364;
            $tY = 27;
            return Image::canvas($x, $y)->text($banertext, $tX, $tY, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/TitilliumWeb-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(28);
            });

        } else if ($pos == 'leaderboard-airplane') {

            /**
             * leaderboard-airplane banner type
             */

            $tX = 174;
            $tY = 43;

            return Image::canvas($x, $y)->text($banertext, $tX, $tY, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Myriad_Pro_Semibold_italic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(39);
            });
        } else if ($pos == 'leaderboard-get-around') {

            /**
             * leaderboard-get-around banner type
             */

            if (str_word_count($banertext) >= 2) {
                $position = strpos($banertext, ' ');
                $firstHalf = substr($banertext, 0, $position);
                $length = strlen($firstHalf);
                $secondHalf = substr($banertext, $length + 1);
            } else {
                $firstHalf = $banertext;
                $secondHalf = null;
            }

            $line = Image::canvas(183, 3, $txtColor);

            return Image::canvas($x, $y)->text($firstHalf, 364, 25, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Merriweather-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(40);
            })->text($secondHalf, 364, 65, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Merriweather-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(40);
            })->insert($line, 'left', 44, 35);
        } else if ($pos == 'leaderboard-iphone7') {

            /**
             * leaderboard-iphone banner type
             */

            return Image::canvas($x, $y)->text($banertext, 364, 25, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(32);
            });

        }
        else if ($pos == 'leaderboard-antivirus') {

            /**
             * leaderboard-iphone banner type
             */

            return Image::canvas($x, $y)->text($banertext, 126, 16, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Roboto-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(25);
            });

        }

        else if ($pos == 'leaderboard-iphoneblue') {

            /**
             * leaderboard-iphone-blue banner type
             */

            return Image::canvas($x, $y)->text($banertext, 190, 45, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Arimo-Regular.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(36);
            });

        }
    }

    public function addFollText($x, $y, $banertext, $color, $pos)
    {
        /**
         * function adds follow txt
         */

        if (empty($banertext)) {
            return Image::canvas(728, 90);
        }

        if ($pos == 'leaderboard-car') {

            if (strstr($banertext, '.')) {
                $position = strpos($banertext, '.');
                $firstHalf = substr($banertext, 0, $position + 1);
                $secondHalf = substr($banertext, $position + 1);
            } else if (strstr($banertext, ' ') && str_word_count($banertext) >= 3) {
                $c = str_word_count($banertext, 1);
                $firstHalf = $c[0] . ' ' . $c[1];
                $length = strlen($firstHalf);
                $secondHalf = substr($banertext, $length + 1);
            } else {
                $firstHalf = $banertext;
                $secondHalf = null;
            }


            return Image::canvas($x, $y)->text($firstHalf, 364, 51, function ($font) use ($color) {
                $font->file(public_path('fonts/TitilliumWeb-Regular.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(15);
            })->text($secondHalf, 364, 71, function ($font) use ($color) {
                $font->file(public_path('fonts/TitilliumWeb-Regular.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(15);
            });

        } else if ($pos == 'leaderboard-airplane') {

            return Image::canvas($x, $y)->text($banertext, 250, 75, function ($font) use ($color) {
                $font->file(public_path('fonts/MyriadProItalic.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(14);
            });

        } else if ($pos == 'leaderboard-get-around') {

            /**
             * leaderboard-get-around banner type
             */

            return Image::canvas($x, $y)->text($banertext, 590, 45, function ($font) use ($color) {
                $font->file(public_path('fonts/Oswald-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(12);
            });
        }
        else if ($pos == 'leaderboard-iphone7') {

            /**
             * leaderboard-iphone banner type
             */

            return Image::canvas($x, $y)->text($banertext, 364, 68, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(38);
            });

        }
        else if($pos == 'leaderboard-antivirus'){

            /**
             * leaderboard-antivirus banner type
             */

            if(str_word_count($banertext) >= 2 ){
                $c = str_word_count($banertext, 1);
                $firstHalf = $c[0]. ' ' .$c[1];
                $length = strlen($firstHalf);
                $secondHalf = substr($banertext, $length+1);
            }
            else {
                $firstHalf = $banertext;
                $secondHalf = null;
            }

            return Image::canvas($x, $y)->text($firstHalf, 126, 45, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(21);
            })->text($secondHalf, 126, 70, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(25);
            });
        }

        else if ($pos == 'leaderboard-iphoneblue') {

            /**
             * leaderboard-iphone-blue banner type
             */

            return Image::canvas($x, $y)->text($banertext, 460, 45, function ($font) use ($color) {
                $font->file(public_path('fonts/Arimo-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(50);
            });

        }
    }

    public function addButton($text, $color, $btcolor, $type)
    {

        /**
         * generate button for leaderboard types
         */

        if (empty($text)) {
            return Image::canvas(182, 34);
        }

        if ($type == 'leaderboard-car') {

            return Image::canvas(184, 34, $btcolor)
                ->text($text, 92, 24, function ($font) use ($color) {
                    $font->file(public_path('fonts/TitilliumWeb-Regular.ttf'));
                    $font->size(14);
                    $font->color($color);
                    $font->align('center');
                });
        } else if ($type == 'leaderboard-airplane') {
            return Image::canvas(122, 90, $btcolor)
                ->opacity(50)
                ->text($text, 61, 51, function ($font) use ($color) {
                    $font->file(public_path('fonts/MyriadProSemibold.ttf'));
                    $font->size(14);
                    $font->color($color);
                    $font->align('center');
                });

        } else if ($type == 'leaderboard-get-around') {

            return Image::canvas(145, 40);
        }

        else if ($type == 'leaderboard-iphone7') {

            if (str_word_count($text) >= 2) {
                $position = strpos($text, ' ');
                $firstHalf = substr($text, 0, $position);
                $length = strlen($firstHalf);
                $secondHalf = substr($text, $length + 1);
            }
            else{
                $firstHalf = $text;
                $secondHalf = null;
            }

            return Image::canvas(140, 90, $btcolor)
                ->text($firstHalf, 70, 40, function ($font) use ($color) {
                    $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                    $font->size(22);
                    $font->color($color);
                    $font->align('center');
                })
                ->text($secondHalf, 70, 70, function ($font) use ($color) {
                    $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                    $font->size(30);
                    $font->color($color);
                    $font->align('center');
                });

        }

        else if($type == 'leaderboard-antivirus'){

            if (str_word_count($text) >= 1) {
                $position = strpos($text, ' ');
                $firstHalf = substr($text, 0, $position);
                $length = strlen($firstHalf);
                $secondHalf = substr($text, $length);
            }
            else if (str_word_count($text) == 0){
                $firstHalf = $text;
                $secondHalf = null;
            }

            /** what if there is no word in last input field? :) */

            return Image::canvas(728, 90)
                ->circle(50, 355, 35, function ($draw) use ($btcolor){
                    $draw->background($btcolor);
                })->text(' > ', 355, 35, function ($font) use ($color){
                    $font->file(public_path('fonts/PTM55FT.ttf'));
                    $font->color($color);
                    $font->size(50);
                    $font->align('center');
                    $font->valign('middle');
                })
                ->text('CLICK HERE', 355, 75, function ($font) use ($btcolor){
                    $font->file(public_path('fonts/Roboto-Bold.ttf'));
                    $font->color($btcolor);
                    $font->size(16);
                    $font->align('center');
                    $font->valign('middle');
                })
                ->circle(160, 655, 90, function ($draw) use ($btcolor){
                    $draw->background($btcolor);
                })
                ->text($secondHalf, 680, 82, function ($font) use ($color) {
                    $font->file(public_path('fonts/Lato-Bold.ttf'));
                    $font->size(26);
                    $font->color($color);
                    $font->align('center');
                    $font->valign('bottom');
                })
                ->text($firstHalf, 640, 40, function ($font) use ($color) {
                    $font->file(public_path('fonts/Roboto-Regular.ttf'));
                    $font->size(40);
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->angle(20);
                });

        }
        else if ($type == 'leaderboard-iphoneblue') {

            /**
             * leaderboard-iphone-blue banner type
             */

            // define polygon points
                $points = array(
                    693,  21, // Point 2 (x, y)E
                    710,  45,  // Point 3 (x, y)D
                    693, 72,  // Point 4 (x, y)C
                    576,  72,  // Point 5 (x, y)B
                    576,  21   // Point 6 (x, y)A
                );

            return Image::canvas(728, 90)->polygon($points, function ($draw) use ($color) {
                $draw->border(2, $color);
            })->text($text, 638, 46, function ($font) use ($color) {
                $font->file(public_path('fonts/Arimo-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(28);
            });

        }
    }
}
