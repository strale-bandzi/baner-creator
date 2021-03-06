<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as Image;

class Rectanglewide extends Model
{

    public function addText($banertext, $txtColor, $pos){

        if (empty($banertext) || $pos == 'rectanglewide-get-around' || $pos == 'rectanglewide-thai'
            || $pos == 'rectanglewide-digimon') {
            return Image::canvas(240, 400);
        }

        if ($pos == 'rectanglewide-airplane') {

            /**
             * Airplane Rectangle Wide Banner text
             */
            if(str_word_count($banertext) >= 2 ){
                $c = str_word_count($banertext, 1);
                $firstHalf = $c[0];
                $secondHalf = $c[1];
            } else {
                $firstHalf = $banertext;
                $secondHalf = null;
            }

            return Image::canvas(240, 400)->text($firstHalf, 120, 70, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Myriad_Pro_Semibold_italic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(48);
            })->text($secondHalf, 120, 130, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Myriad_Pro_Semibold_italic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(48);
            });

        }
        else if ($pos == 'rectanglewide-get-around') {

            /**
             * rectanglewide-get around banner type
             */

            if(str_word_count($banertext) >= 2 ){
                $c = str_word_count($banertext, 1);
                $firstHalf = $c[0];
                $secondHalf = $c[1];
            } else {
                $firstHalf = $banertext;
                $secondHalf = null;
            }
            $line = Image::canvas(183, 3, $txtColor);

            return Image::canvas(240, 400)->text($firstHalf, 120, 118, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Merriweather-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(41);
            })->text($secondHalf, 120, 159, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Merriweather-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(41);
            })->insert($line, 'bottom', 10, 117);

        }
        else if ($pos == 'rectanglewide-iphoneblue') {

            /**
             * skycraper-iphone-blue banner type
             */

            if(str_word_count($banertext) >=3){
                $position = strpos($banertext, ' ');    // position of first word

                $first = substr($banertext, 0, $position);  //gives first word
                $secondString = substr($banertext, $position); // Gives next 2 strings

                $secondPosition = strpos($secondString, ' ', 1);

                $second = substr($secondString, 0, $secondPosition); //gives second word
                $third = substr($secondString, $secondPosition); // gives third word

            } else if (str_word_count($banertext) ==2) {
                $c = str_word_count($banertext, 1);
                $first = $c[0];
                $second = $c[1];
                $third = null;
            }
            else {
                $first = $banertext;
                $second = null;
                $third = null;
            }

            return Image::canvas(240, 400)->text($first, 120, 100, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Arimo-Regular.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(36);
            })->text($second, 120, 140, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Arimo-Regular.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(34);
            })->text($third, 120, 182, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Arimo-Regular.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(34);
            });

        }
        else if ($pos == 'rectanglewide-iphone7') {

            /**
             * rectanglewide-iphone7 banner type
             */

            return Image::canvas(240, 400)->text($banertext, 120, 75, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(32);
            });

        }
        else if ($pos == 'rectanglewide-antivirus') {

            /**
             * rectanglewide-antivirus banner type
             */

            return Image::canvas(240, 400)->text($banertext, 124, 52, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Roboto-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(40);
            });

        }

        else if ($pos == 'rectanglewide-medicine') {

            /**
             * rectanglewide-medicine banner type
             */

            return Image::canvas(240, 400)->text($banertext, 7, 50, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Myriad-Pro-Bold-Italic.ttf'));
                $font->color($txtColor);
                $font->align('left');
                $font->valign('middle');
                $font->size(42);
            });

        }
        else if ($pos == 'rectanglewide-jewels') {

            /**
             * Jewels rectanglewide Banner main text
             */

            $position = strpos($banertext, ' ');
            $firstHalf = substr($banertext, 0, $position);
            $secondHalf = substr($banertext, $position + 1);

            $line = Image::canvas(192, 3, $txtColor);

            return Image::canvas(240, 400)->text($firstHalf, 115, 305, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/BodoniMTCondensedItalic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(43);
            })->text($secondHalf, 119, 339, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/BodoniMTCondensedItalic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(43);
            })->insert($line, 'top', 0, 358);

        }
        else if ($pos == 'rectanglewide-i7') {

            /**
             * rectanglewide-iphone-7 banner type
             */

            $position = strpos($banertext, ' ');    // position of first word

            $first = substr($banertext, 0, $position);  //gives first word
            $secondString = substr($banertext, $position); // Gives next 2 strings

            $secondPosition = strpos($secondString, ' ', 1);

            $second = substr($secondString, 0, $secondPosition); //gives second word
            $third = substr($secondString, $secondPosition); // gives third word


            return Image::canvas(240, 400)->text($first, 120, 40, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Arimo-Regular.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(34);
            })->text($second, 119, 65, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Arimo-Regular.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(32);
            })->text($third, 119, 91, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Arimo-Regular.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(34);
            });

        }
        else if ($pos == 'rectanglewide-seminar') {

            /**
             * UI seminar banner type
             */
            if(str_word_count($banertext) >= 2 ){
                $c = str_word_count($banertext, 1);
                $first = $c[0];
                $second = $c[1];
                $length = strlen($c[0].$c[1]);
                $third = substr($banertext, $length+2);
            }
            else {
                $first = null;
                $second = $banertext;
                $third = null;
            }

            return Image::canvas(240, 400)->text($first, 11, 148, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/GillSansUltraBold.ttf'));
                $font->color($txtColor);
                $font->align('left');
                $font->valign('middle');
                $font->size(29);
            })->text($second, 11, 184, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/GillSansUltraBold.ttf'));
                $font->color($txtColor);
                $font->align('left');
                $font->valign('middle');
                $font->size(29);
            })->text($third, 11, 220, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/GillSansUltraBold.ttf'));
                $font->color($txtColor);
                $font->align('left');
                $font->valign('middle');
                $font->size(29);
            });

        }
        else if ($pos == 'rectanglewide-shopping') {

            /**
             * shopping banner main text
             */

            if(str_word_count($banertext) >= 1){
                $position = strpos($banertext, ' ');
                $first = substr($banertext, 0, $position);
                $second = substr($banertext, $position + 1);
            }
            else {
                $first = null;
                $second = $banertext;
            }

            return Image::canvas(240, 400)->text($first, 142, 270, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/BodoniMT-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->angle(15);
                $font->size(90);
            })->text($second, 145, 342, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/BodoniMT-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->angle(15);
                $font->size(90);
            });

        }



    }

    public function addFollText($banertext, $color, $pos){

        if (empty($banertext) || $pos == 'rectanglewide-get-around' || $pos == 'rectanglewide-thai'
            || $pos == 'rectanglewide-digimon') {
            return Image::canvas(240, 400);
        }

        else if ($pos == 'rectanglewide-airplane') {

            /**
             * Airplane Rectangle Wide Banner follow text
             */

            return Image::canvas(240, 400)->text($banertext, 120, 385, function ($font) use ($color) {
                $font->file(public_path('fonts/MyriadProItalic.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(12);
            });

        }else if ($pos == 'rectanglewide-get-around') {

            /**
             * Get Around rectanglewide Banner follow text
             */

            return Image::canvas(240, 400)->text($banertext, 120, 210, function ($font) use ($color) {
                $font->file(public_path('fonts/OpenSans-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(9);
            });

        }
        else if ($pos == 'rectanglewide-iphoneblue') {

            /**
             * rectanglewide-iphone-blue banner type
             */

            return Image::canvas(240, 400)->text($banertext, 120, 230, function ($font) use ($color) {
                $font->file(public_path('fonts/Arimo-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(32);
            });

        }
        else if ($pos == 'rectanglewide-iphone7') {

            /**
             * rectanglewide-iphone7 banner type
             */

            return Image::canvas(240, 400)->text($banertext, 120, 122, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(36);
            });

        }
        else if ($pos == 'rectanglewide-antivirus') {

            /**
             * rectanglewide-antivirus banner type
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

            return Image::canvas(240, 400)->text($firstHalf, 120, 100, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-Regular.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(34);
            })->text($secondHalf, 120, 140, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-Regular.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(38);
            });

        }
        else if ($pos == 'rectanglewide-medicine') {

            /**
             * rectanglewide-medicine follow text
             */

            return Image::canvas(240, 400)->text($banertext, 10, 100, function ($font) use ($color) {
                $font->file(public_path('fonts/Myriad-Pro-Bold-Italic.ttf'));
                $font->color($color);
                $font->align('left');
                $font->valign('middle');
                $font->size(43);
            });

        }
        else if ($pos == 'rectanglewide-jewels') {

            /**
             * rectanglewide  Banner follow text
             */


            return Image::canvas(240, 400)->text($banertext, 120, 373, function ($font) use ($color) {
                $font->file(public_path('fonts/RobotoCondensed-Regular.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(17);
            });

        }
        else if ($pos == 'rectanglewide-i7') {

            /**
             * rectanglewide-iphone7 banner type
             */

            return Image::canvas(240, 400)->text($banertext, 120, 120, function ($font) use ($color) {
                $font->file(public_path('fonts/Arimo-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(32);
            });

        }
        else if ($pos == 'rectanglewide-seminar') {

            /**
             * UI seminar follow text
             */
            $points3 = array(
                94, 0, // D
                240, 150, // C
                240, 154,      // Point B
                90,  0   // Point A
            );
            $points2 = array(
                0, 285, // D
                240, 285, // C
                240,  288,      // Point B
                0,  288   // Point A
            );
            $points = array(
                0, 105, // D
                240, 105, // C
                240,  108, // Point B
                0,  108   // Point A
            );


            $line = Image::canvas(240, 400)
                ->polygon($points, function ($draw) use ($color) {
                    $draw->background($color);
                })
                ->polygon($points2, function ($draw) use ($color) {
                    $draw->background($color);
                })
                ->polygon($points3, function ($draw) use ($color) {
                    $draw->background($color);
                });

            return Image::canvas(240, 400)->text($banertext, 120, 316, function ($font) use ($color) {
                $font->file(public_path('fonts/CopperplateGothicBold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(16);
            })->insert($line);

        }
        else if ($pos == 'rectanglewide-shopping') {

            /**
             * rectanglewide  shopping follow text
             */

            if(str_word_count($banertext) >= 6 ){
                $c = str_word_count($banertext, 1);
                $firstHalf = $c[0]. ' ' .$c[1] . ' ' .$c[2];
                $secondHalf = $c[3]. ' ' .$c[4] . ' ' .$c[5]. ' ' .$c[6];
                $length = strlen($firstHalf) + strlen($secondHalf)+2;
                $third = substr($banertext, $length);

            }
            else if (str_word_count($banertext) <= 3){
                $firstHalf = null;
                $secondHalf = $banertext;
                $third = null;
            }
            else if (str_word_count($banertext) > 3 && str_word_count($banertext) < 6){
                $position = strpos($banertext, ' ');

                $firstHalf = substr($banertext, 0, $position);
                $secondString = substr($banertext, $position);

                $secondPosition = strpos($secondString, ' ', 1);

                $secondHalf = substr($secondString, 0, $secondPosition);
                $third = substr($secondString, $secondPosition);
            }

            return Image::canvas(240, 400)->text($firstHalf, 120, 55, function ($font) use ($color) {
                $font->file(public_path('fonts/ACaslonPro-Italic.otf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(16);
            })->text($secondHalf, 120, 75, function ($font) use ($color) {
                $font->file(public_path('fonts/ACaslonPro-Italic.otf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(16);
            })->text($third, 112, 96, function ($font) use ($color) {
                $font->file(public_path('fonts/ACaslonPro-Italic.otf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(16);
            });

        }



}

    public function addButton($text, $color, $btcolor, $type){

        if (empty($text) || $type == 'rectanglewide-get-around' || $type == 'rectanglewide-jewels'
        || $type == 'rectanglewide-seminar') {
            return Image::canvas(240, 400);
        }

        else if ($type == 'rectanglewide-airplane') {
            return Image::canvas(240, 400)
                ->rectangle(0, 329, 400, 362, function ($draw) use ($btcolor) {
                    $draw->background($btcolor);
                })
                ->opacity(50)
                ->text($text, 120, 346, function ($font) use ($color) {
                    $font->file(public_path('fonts/MyriadProSemibold.ttf'));
                    $font->size(22);
                    $font->color($color);
                    $font->valign('middle');
                    $font->align('center');
                });

        }

        else if ($type == 'rectanglewide-thai') {

            /**
             * rectanglewide-thai banner type
             */

                if(str_word_count($text) >= 5 ){
                    $c = str_word_count($text, 1);
                    $firstHalf = $c[0]. ' ' .$c[1] . ' ' .$c[2];
                    $secondHalf = substr($text, strlen($firstHalf), strpos($firstHalf,' '));

                    $length = strlen($firstHalf) + strlen($secondHalf);
                    $third = substr($text, $length);

                } else if (str_word_count($text) <= 2){
                    $firstHalf = null;
                    $secondHalf = $text;
                    $third = null;
                }
                else if (str_word_count($text) > 2 && str_word_count($text) < 5){
                    $position = strpos($text, ' ');

                    $firstHalf = substr($text, 0, $position);
                    $secondString = substr($text, $position);

                    $secondPosition = strpos($secondString, ' ', 1);

                    $secondHalf = substr($secondString, 0, $secondPosition);
                    $third = substr($secondString, $secondPosition);
                }

            return Image::canvas(240, 400)
                ->circle(224, 120, 202, function ($draw) use ($btcolor){
                    $draw->background($btcolor);
                })
                ->opacity(90)
                ->text($firstHalf, 120, 170, function ($font) use ($color) {
                    $font->file(public_path('fonts/BodoniMTCondensedBoldItalic.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(53);
                })
                ->text($secondHalf, 120, 205, function ($font) use ($color) {
                    $font->file(public_path('fonts/BodoniMTCondensedBoldItalic.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(46);
                })
                ->text($third, 116, 247, function ($font) use ($color) {
                    $font->file(public_path('fonts/BodoniMTCondensedBoldItalic.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(62);
                });
        }

        else if ($type == 'rectanglewide-iphoneblue') {

            /**
             * rectanglewide-iphone-blue banner type
             */

            // define polygon points
            $points = array(
                170, 317, // Point 2 (x, y)E top right
                187, 343,  // Point 3 (x, y)D krak
                170, 368,  // Point 4 (x, y)C bottom right
                53,  368,  // Point 5 (x, y)B bottom left
                53,  317   // Point 6 (x, y)A top left
            );

                return Image::canvas(240, 400)->polygon($points, function ($draw) use ($color) {
                    $draw->border(3, $color);
                })->text($text, 118, 343, function ($font) use ($color) {
                    $font->file(public_path('fonts/Arimo-Bold.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(27);
                });

        }
        else if ($type == 'rectanglewide-iphone7') {

            return Image::canvas(240, 400)
                ->rectangle(0, 355, 240, 400, function ($draw) use ($btcolor) {
                    $draw->background($btcolor);
                })
                ->text($text, 120, 385, function ($font) use ($color) {
                    $font->file(public_path('fonts/Roboto-Regular.ttf'));
                    $font->size(20);
                    $font->color($color);
                    $font->align('center');
                    $font->valign('bottom');
                });

        }
        else if ($type == 'rectanglewide-antivirus') {

            $position = strpos($text, ' ');

            $firstHalf = substr($text, 0, $position);
            $secondHalf = substr($text, $position +1);

            return Image::canvas(240, 400)
                ->circle(68, 125, 234, function ($draw) use ($btcolor){
                    $draw->background($btcolor);
                    $draw->border(1, $btcolor);
                })->text(' > ', 125, 234, function ($font) use ($color){
                    $font->file(public_path('fonts/PTM55FT.ttf'));
                    $font->color($color);
                    $font->size(60);
                    $font->align('center');
                    $font->valign('middle');
                })
                ->text('CLICK HERE', 125, 290, function ($font) use ($btcolor){
                    $font->file(public_path('fonts/Roboto-Bold.ttf'));
                    $font->color($btcolor);
                    $font->size(24);
                    $font->align('center');
                    $font->valign('middle');
                })
                ->circle(205, 220, 413, function ($draw) use ($btcolor){
                    $draw->background($btcolor);
                    $draw->border(1, $btcolor);
                })
                ->text($secondHalf, 208, 380, function ($font) use ($color) {
                    $font->file(public_path('fonts/Lato-Bold.ttf'));
                    $font->size(17);
                    $font->color($color);
                    $font->align('center');
                    $font->valign('bottom');
                })
                ->text($firstHalf, 180, 351, function ($font) use ($color) {
                    $font->file(public_path('fonts/Roboto-Regular.ttf'));
                    $font->size(32);
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->angle(21);
                });
        }
        else if ($type == 'rectanglewide-medicine') {

            return Image::canvas(240, 400)
                ->rectangle(0, 364, 240, 400, function ($draw) use ($btcolor) {
                    $draw->background($btcolor);
                })
                ->text($text, 120, 392, function ($font) use ($color) {
                    $font->file(public_path('fonts/Myriad-Pro-Bold-Italic.ttf'));
                    $font->size(29);
                    $font->color($color);
                    $font->align('center');
                    $font->valign('bottom');
                });

        }
        else if ($type == 'rectanglewide-digimon') {

            return Image::canvas(240, 400)
                ->rectangle(0, 346, 240, 400, function ($draw) use ($btcolor) {
                    $draw->background($btcolor);
                })
                ->text($text, 120, 385, function ($font) use ($color) {
                    $font->file(public_path('fonts/CASTELAR.ttf'));
                    $font->size(20);
                    $font->color($color);
                    $font->align('center');
                    $font->valign('bottom');
                });

        }
        else if ($type == 'rectanglewide-i7') {

            $width = 128;
            $height = 52;

            $widebro = Image::canvas(124, 50)
                ->circle($width, $width / 2 -2.1, $height / 2 -1, function ($draw) use ($btcolor) {
                    $draw->background($btcolor);
                    $draw->border(1, $btcolor);
                })
                ->text($text, 62, 25, function ($font) use ($color) {
                    $font->file(public_path('fonts/Arimo-Bold.ttf'));
                    $font->size(20);
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                });

            return Image::canvas(240, 400)->insert($widebro, 'bottom', 50, 18);

        }
        else if ($type == 'rectanglewide-shopping') {

            /**
             * leaderboard-shopping button type
             */

          if(str_word_count($text) >= 2)
          {
              $position = strpos($text, ' ');
              $firstHalf = substr($text, 0, $position);
              $secondHalf = substr($text, $position + 1);
          }else {
              $firstHalf = null;
              $secondHalf = $text;
          }

            // define polygon points
            $points = array(
                155, 135,    // H
                214, 135, // G
                216, 138, // F
                216, 211,  //E
                214, 213,  //D X: D=G Y: D=C
                155, 213, // C X: C=H Y: C=D
                153, 211, //B X: A=B Y: B=E
                153, 138   //A X: A=B Y: A=F
            );

            return Image::canvas(240, 400)
                ->polygon($points, function ($draw) use ($color) {
                    $draw->border(3, $color);
                })->text($firstHalf, 188, 165, function ($font) use ($color) {
                    $font->file(public_path('fonts/BookAntiquaBoldItalic.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(17);
                })
                ->text($secondHalf, 187, 183, function ($font) use ($color) {
                    $font->file(public_path('fonts/BookAntiquaBoldItalic.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(17);
                });

        }

    }
}
