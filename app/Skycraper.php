<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Intervention\Image\Facades\Image as Image;

class Skycraper extends Model
{

    /**
     * function adds main txt
     */

    public function addText($x, $y, $banertext, $txtColor, $pos)
    {

        if (empty($banertext) || $pos == 'skycraper-thai' || $pos == 'skycraper-digimon') {
            return Image::canvas(160, 600);
        }

        /**
         * Skycraper-antivirus banner type
         */

        if ($pos == 'skycraper-antivirus') {

            return Image::canvas(160, 600)->text($banertext, 80, 98, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Roboto-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(34);
            });

        }
        else if ($pos == 'skycraper-iphone7') {

            /**
             * Skycraper-iphone7 banner type
             */

            if(str_word_count($banertext) >= 3 ){
                $c = str_word_count($banertext, 1);
                $firstHalf = $c[0]. ' ' .$c[1];
                $length = strlen($firstHalf);
                $secondHalf = substr($banertext, $length+1);
            }

            return Image::canvas($x, $y)->text($firstHalf, 80, 101, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(27.5);
            })->text($secondHalf, 80, 141, function ($font) use ($txtColor) {
                    $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                    $font->color($txtColor);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(57);
                });

        }
        else if ($pos == 'skycraper-airplane') {

            /**
             * Skycraper-airplane banner type
             */

            if(str_word_count($banertext) >= 2 ){
                $c = str_word_count($banertext, 1);
                $firstHalf = $c[0];
                $secondHalf = $c[1];
            } else {
                $firstHalf = $banertext;
                $secondHalf = null;
            }

            return Image::canvas($x, $y)->text($firstHalf, 80, 83, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Myriad_Pro_Semibold_italic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(36);
            })
            ->text($secondHalf, 80, 130, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Myriad_Pro_Semibold_italic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(36);
            });

        }

        else if ($pos == 'skycraper-get-around') {

            /**
             * Skycraper-get around banner type
             */

            if(str_word_count($banertext) >= 2 ){
                $c = str_word_count($banertext, 1);
                $firstHalf = $c[0];
                $secondHalf = $c[1];
            } else {
                $firstHalf = $banertext;
                $secondHalf = null;
            }
            $line = Image::canvas(146, 3, $txtColor);

            return Image::canvas($x, $y)->text($firstHalf, 80, 213, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Merriweather-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(31);
            })->text($secondHalf, 80, 245, function ($font) use ($txtColor) {
                    $font->file(public_path('fonts/Merriweather-Bold.ttf'));
                    $font->color($txtColor);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(31);
                })->insert($line, 'bottom', 10, 90);

        }
         else if ($pos == 'skycraper-iphoneblue') {

            /**
             * skycraper-iphone-blue banner type
             */

             $position = strpos($banertext, ' ');    // position of first word

             $first = substr($banertext, 0, $position);  //gives first word
             $secondString = substr($banertext, $position); // Gives next 2 strings

             $secondPosition = strpos($secondString, ' ', 1);

             $second = substr($secondString, 0, $secondPosition); //gives second word
             $third = substr($secondString, $secondPosition); // gives third word


            return Image::canvas(160, 600)->text($first, 80, 172, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Arimo-Regular.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(36);
            })->text($second, 80, 215, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Arimo-Regular.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(36);
            })->text($third, 80, 260, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Arimo-Regular.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(36);
            });

        }

         else if ($pos == 'skycraper-medicine') {

             /**
              * Skycraper-medicine banner type
              */

             if(str_word_count($banertext) >= 4 ){
                 $c = str_word_count($banertext, 1);
                 $first = $c[0]. ' '.$c[1];
                 $second = $c[2];
                 $third = $c[3];
                 $fourth = $c[4];
             } else if(str_word_count($banertext) <= 3 ){
                 $c = str_word_count($banertext, 1);
                 $first = $c[0]. ' '.$c[1];
                 $second = $c[2];;
                 $third = null;
                 $fourth = null;
             }

             return Image::canvas(160, 600)
                  ->text($first, 10, 71, function ($font) use ($txtColor) {
                     $font->file(public_path('fonts/Myriad-Pro-Bold-Italic.ttf'));
                     $font->color($txtColor);
                     $font->align('left');
                     $font->valign('middle');
                     $font->size(49);
                })->text($second, 10, 122, function ($font) use ($txtColor) {
                     $font->file(public_path('fonts/Myriad-Pro-Bold-Italic.ttf'));
                     $font->color($txtColor);
                     $font->align('left');
                     $font->valign('middle');
                     $font->size(49);
                 })->text($third, 10, 180, function ($font) use ($txtColor) {
                     $font->file(public_path('fonts/Myriad-Pro-Bold-Italic.ttf'));
                     $font->color($txtColor);
                     $font->align('left');
                     $font->valign('middle');
                     $font->size(49);
                 })->text($fourth, 10, 228, function ($font) use ($txtColor) {
                     $font->file(public_path('fonts/Myriad-Pro-Bold-Italic.ttf'));
                     $font->color($txtColor);
                     $font->align('left');
                     $font->valign('middle');
                     $font->size(50);
             });

         }

         else if ($pos == 'skycraper-jewels') {

             /**
              * Jewels skycraper main banner text
              */

             $position = strpos($banertext, ' ');
             $firstHalf = substr($banertext, 0, $position);
             $secondHalf = substr($banertext, $position + 1);

             $line = Image::canvas(146, 2, $txtColor);

             return Image::canvas(160, 600)->text($firstHalf, 76, 493, function ($font) use ($txtColor) {
                 $font->file(public_path('fonts/BodoniMTCondensedItalic.ttf'));
                 $font->color($txtColor);
                 $font->align('center');
                 $font->valign('middle');
                 $font->size(33);
             })->text($secondHalf, 79, 520, function ($font) use ($txtColor) {
                 $font->file(public_path('fonts/BodoniMTCondensedItalic.ttf'));
                 $font->color($txtColor);
                 $font->align('center');
                 $font->valign('middle');
                 $font->size(33);
             })->insert($line, 'bottom', 3, 62);

         }
         else if ($pos == 'skycraper-i7') {

             /**
              * skycraper-iphone-7 banner type
              */

             $position = strpos($banertext, ' ');    // position of first word

             $first = substr($banertext, 0, $position);  //gives first word
             $secondString = substr($banertext, $position); // Gives next 2 strings

             $secondPosition = strpos($secondString, ' ', 1);

             $second = substr($secondString, 0, $secondPosition); //gives second word
             $third = substr($secondString, $secondPosition); // gives third word


             return Image::canvas(160, 600)->text($first, 80, 55, function ($font) use ($txtColor) {
                 $font->file(public_path('fonts/Arimo-Regular.ttf'));
                 $font->color($txtColor);
                 $font->align('center');
                 $font->valign('middle');
                 $font->size(40);
             })->text($second, 75, 107, function ($font) use ($txtColor) {
                 $font->file(public_path('fonts/Arimo-Regular.ttf'));
                 $font->color($txtColor);
                 $font->align('center');
                 $font->valign('middle');
                 $font->size(38);
             })->text($third, 75, 162, function ($font) use ($txtColor) {
                 $font->file(public_path('fonts/Arimo-Regular.ttf'));
                 $font->color($txtColor);
                 $font->align('center');
                 $font->valign('middle');
                 $font->size(38);
             });

         }


    }

    public function addFollText($x, $y, $banertext, $color, $pos)
    {
        /**
         * function adds follow txt
         */

        if (empty($banertext) || $pos == 'skycraper-thai' || $pos == 'skycraper-digimon'
            || $pos == 'skycraper-medicine') {
            return Image::canvas(160, 600);
        }

         if ($pos == 'skycraper-antivirus') {

            $position = strpos($banertext, ' ');    // position of first word

            $first = substr($banertext, 0, $position);  //gives first word
            $secondString = substr($banertext, $position); // Gives next 2 strings

            $secondPosition = strpos($secondString, ' ', 1);

            $second = substr($secondString, 0, $secondPosition); //gives second word
            $third = substr($secondString, $secondPosition); // gives third word


            return Image::canvas($x, $y)->text($first, 80, 145, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-Regular.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(35);
            })->text($second, 80, 183, function ($font) use ($color) {
                    $font->file(public_path('fonts/Roboto-Regular.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(32);
            })
            ->text($third, 80, 225, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-Regular.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(35);
            });

        }

        else if ($pos == 'skycraper-iphone7') {

            return Image::canvas($x, $y)->text($banertext, 80, 196, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(37);
            });

        } else if ($pos == 'skycraper-airplane') {

            return Image::canvas($x, $y)->text($banertext, 80, 583, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(12);
            });

        }
        else if ($pos == 'skycraper-get-around') {

            if (str_word_count($banertext) >= 2) {
                $c = str_word_count($banertext, 1);
                $firstHalf = $c[0] . ' ' . $c[1];
                $length = strlen($firstHalf);
                $secondHalf = substr($banertext, $length + 1);
            } else {
                $firstHalf = $banertext;
                $secondHalf = null;
            }


            return Image::canvas($x, $y)->text($firstHalf, 80, 530, function ($font) use ($color) {
                $font->file(public_path('fonts/OpenSans-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(14);
            })->text($secondHalf, 80, 549, function ($font) use ($color) {
                $font->file(public_path('fonts/OpenSans-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(14);
            });

        }
        else if ($pos == 'skycraper-iphoneblue') {

            /**
             * skycraper-iphone-blue banner type
             */

            return Image::canvas(160, 600)->text($banertext, 81, 305, function ($font) use ($color) {
                $font->file(public_path('fonts/Arimo-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(32);
            });

        }
        else if ($pos == 'skycraper-jewels') {

            /**
             * skycraper  jewels follow text
             */


            return Image::canvas(160, 600)->text($banertext, 81, 548, function ($font) use ($color) {
                $font->file(public_path('fonts/RobotoCondensed-Regular.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(12.2);
            });

        }
        else if ($pos == 'skycraper-i7') {

            /**
             * skycraper-iphon77 banner type
             */

            return Image::canvas(160, 600)->text($banertext, 80, 481, function ($font) use ($color) {
                $font->file(public_path('fonts/Arimo-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(32);
            });

        }



    }

    public function addButton($text, $color, $btcolor, $type)
    {

        /**
         * generate button for skycraper types
         */


        if (empty($text) || $type == 'skycraper-get-around' || $type == 'skycraper-jewels') {
            return Image::canvas(182, 34);
        }

        if ($type == 'skycraper-antivirus') {

            $position = strpos($text, ' ');

            $firstHalf = substr($text, 0, $position);
            $secondHalf = substr($text, $position +1);

            return Image::canvas(160, 600)
                ->circle(60, 80, 350, function ($draw) use ($btcolor){
                    $draw->background($btcolor);
                })->text(' > ', 80, 350, function ($font) use ($color){
                    $font->file(public_path('fonts/PTM55FT.ttf'));
                    $font->color($color);
                    $font->size(60);
                    $font->align('center');
                    $font->valign('middle');
                })
                ->text('CLICK HERE', 80, 410, function ($font) use ($btcolor){
                    $font->file(public_path('fonts/Roboto-Bold.ttf'));
                    $font->color($btcolor);
                    $font->size(16);
                    $font->align('center');
                    $font->valign('middle');
                })
                ->circle(160, 80, 600, function ($draw) use ($btcolor){
                    $draw->background($btcolor);
                })
                ->text($secondHalf, 103, 590, function ($font) use ($color) {
                    $font->file(public_path('fonts/Lato-Bold.ttf'));
                    $font->size(25);
                    $font->color($color);
                    $font->align('center');
                    $font->valign('bottom');
                })
                ->text($firstHalf, 63, 552, function ($font) use ($color) {
                    $font->file(public_path('fonts/Roboto-Regular.ttf'));
                    $font->size(38);
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->angle(20);
                });
        }

        else if($type == 'skycraper-iphone7'){

            return Image::canvas(160, 40, $btcolor)->text($text, 80, 20, function ($font) use ($color){
                    $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                    $font->color($color);
                    $font->size(22);
                    $font->align('center');
                    $font->valign('middle');
                });
        }
        else if($type == 'skycraper-airplane'){

            return Image::canvas(140, 55, $btcolor)
                ->opacity(50)
                ->text($text, 70, 30, function ($font) use ($color){
                $font->file(public_path('fonts/MyriadProSemibold.ttf'));
                $font->color($color);
                $font->size(20);
                $font->align('center');
                $font->valign('middle');
            });
        }

        else if ($type == 'skycraper-iphoneblue') {

            /**
             * skycraper-iphone-blue banner type
             */

            // define polygon points
            $points = array(
                133,  517, // Point 2 (x, y)E
                150,  542,  // Point 3 (x, y)D
                133, 568,  // Point 4 (x, y)C
                16,  568,  // Point 5 (x, y)B
                16,  517   // Point 6 (x, y)A
            );

            return Image::canvas(160, 600)->polygon($points, function ($draw) use ($color) {
                $draw->border(2, $color);
            })->text($text, 80, 543, function ($font) use ($color) {
                $font->file(public_path('fonts/Arimo-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(26);
            });

        }
        else if ($type == 'skycraper-thai') {

            /**
             * skycraper-thai banner type
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

            return Image::canvas(160, 600)
                ->circle(140, 80, 304, function ($draw) use ($btcolor){
                    $draw->background($btcolor);
                })
                ->opacity(90)
                ->text($firstHalf, 80, 282, function ($font) use ($color) {
                    $font->file(public_path('fonts/BodoniMTCondensedBoldItalic.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(36);
                })
                ->text($secondHalf, 80, 305, function ($font) use ($color) {
                    $font->file(public_path('fonts/BodoniMTCondensedBoldItalic.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(40);
                })
                ->text($third, 79, 332, function ($font) use ($color) {
                    $font->file(public_path('fonts/BodoniMTCondensedBoldItalic.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(40);
                });
        }
            else if ($type == 'skycraper-medicine') {

                /** skycraper medicine banner button */

                $points = array(
                    160,  194,  // Point D
                    160, 295,  // Point C
                    0,  520,  // Point B
                    0,  424   // Point A
                );
                $points2 = array(
                    160,  194,  // Point D
                    160, 300,  // Point C
                    0,  525,  // Point B
                    0,  424   // Point A
                );

                return Image::canvas(160, 600)
                    ->polygon($points2, function ($draw) use ($btcolor) {
                        $draw->background($btcolor);
                    })->opacity(30)
                    ->polygon($points, function ($draw) use ($btcolor) {
                        $draw->background($btcolor);
                    })
                    ->text($text, 78, 362, function ($font) use ($color) {
                        $font->file(public_path('fonts/Myriad-Pro-Bold-Italic.ttf'));
                        $font->size(30);
                        $font->color($color);
                        $font->align('center');
                        $font->valign('middle');
                        $font->angle(55);
                    });

            }
            else if($type == 'skycraper-digimon'){

                /** skycraper digimon banner button */

                return Image::canvas(160, 600)
                    ->rectangle(0, 564, 600, 600, function ($draw) use ($btcolor) {
                        $draw->background($btcolor);
                    })->text($text, 80, 582, function ($font) use ($color){
                    $font->file(public_path('fonts/CASTELAR.ttf'));
                    $font->color($color);
                    $font->size(30);
                    $font->align('center');
                    $font->valign('middle');
                });
            }
            else if ($type == 'skycraper-i7') {

                /**
                 * skycraper-iphone-7 banner type
                 */

                return Image::canvas(160, 600)->rectangle(11, 537, 147, 587, function ($draw) use ($btcolor) {
                    $draw->background($btcolor);
                })->text($text, 80, 562, function ($font) use ($color) {
                    $font->file(public_path('fonts/Arimo-Bold.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(25);
                });

            }
    }
}
