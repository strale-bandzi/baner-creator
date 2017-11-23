<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Intervention\Image\Facades\Image as Image;

class Rectangle extends Model
{
    /**
     * function adds main txt
     */

    public function addText($banertext, $txtColor, $pos)
    {

        if (empty($banertext) || $pos == 'rectangle-thai') {
            return Image::canvas(300, 250);
        }

        if ($pos == 'rectangle-kismetrics') {

            /**
             * Kismetrics rectangle banner
             */

            if (strstr($banertext, ',')) {

                $position = strpos($banertext, ',');
                $firstHalf = substr($banertext, 0, $position + 1); #will display text and comma
                $secondHalf = substr($banertext, $position + 2); #will display text after comma

            } else if (strstr($banertext, ' ') && str_word_count($banertext) >= 3) {
                $c = str_word_count($banertext, 1);
                $firstHalf = $c[0] . ' ' . $c[1];
                $length = strlen($firstHalf);
                $secondHalf = substr($banertext, $length + 1);

            } else {

                $firstHalf = $banertext;
                $secondHalf = null;
            }

            return Image::canvas(300, 250)->text($firstHalf, 18, 80, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Gudea-Bold.ttf'));
                $font->color($txtColor);
                $font->align('left');
                $font->valign('middle');
                $font->size(28.5);
            })
                ->text($secondHalf, 18, 110, function ($font) use ($txtColor) {
                    $font->file(public_path('fonts/Gudea-Bold.ttf'));
                    $font->color($txtColor);
                    $font->align('left');
                    $font->valign('middle');
                    $font->size(28.5);
                });

        } else if ($pos == 'rectangle-get-around') {

            /**
             * Get Around Rectangle Banner
             */

            $position = strpos($banertext, ' ');
            $firstHalf = substr($banertext, 0, $position);
            $secondHalf = substr($banertext, $position + 1);

            $line = Image::canvas(180, 3, $txtColor);

            return Image::canvas(300, 250)->text($firstHalf, 150, 66, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Merriweather-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(40);
            })->text($secondHalf, 150, 106, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Merriweather-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(40);
            })->insert($line, 'bottom', 0, 35);

        }
        else if ($pos == 'rectangle-airplane') {

            /**
             * Airplane Rectangle Banner text
             */

            return Image::canvas(300, 250)->text($banertext, 150, 150, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Myriad_Pro_Semibold_italic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(36);
            });

        }
        else if ($pos == 'rectangle-iphone') {

            /**
             * rectangle-iphone banner type
             */

            return Image::canvas(300, 250)->text($banertext, 7, 29, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($txtColor);
                $font->align('left');
                $font->valign('middle');
                $font->size(30);
            });

        }
        else if ($pos == 'rectangle-antivirus') {

            /**
             * rectangle-antivirus banner type
             */

            return Image::canvas(300, 250)->text($banertext, 280, 45, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Roboto-Bold.ttf'));
                $font->color($txtColor);
                $font->align('right');
                $font->valign('middle');
                $font->size(38);
            });

        }
        else if ($pos == 'rectangle-iphoneblue') {

            /**
             * rectangle-iphone-blue banner type
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

            return Image::canvas(300, 250)->text($first, 150, 51, function ($font) use ($txtColor) {
                    $font->file(public_path('fonts/Arimo-Bold.ttf'));
                    $font->color($txtColor);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(66);
                })->text($second, 148, 95, function ($font) use ($txtColor) {
                    $font->file(public_path('fonts/Arimo-Bold.ttf'));
                    $font->color($txtColor);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(42);
                })->text($third, 148, 133, function ($font) use ($txtColor) {
                    $font->file(public_path('fonts/Arimo-Bold.ttf'));
                    $font->color($txtColor);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(50);
                });

        }
        else if ($pos == 'rectangle-medicine') {

            /**
             * rectangle-medicine banner type
             */

            return Image::canvas(300, 250)->text($banertext, 22, 43, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Myriad-Pro-Bold-Italic.ttf'));
                $font->color($txtColor);
                $font->align('left');
                $font->valign('middle');
                $font->size(48);
            });

        }
        else if ($pos == 'rectangle-digimon') {

            /**
             * rectangle-digimon banner type
             */

            return Image::canvas(300, 250)->text($banertext, 290, 175, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Myriad-Pro-Bold-Italic.ttf'));
                $font->color($txtColor);
                $font->align('right');
                $font->valign('middle');
                $font->size(40);
            });

        }
        else if ($pos == 'rectangle-jewels') {

            /**
             * Jewels Rectangle Banner main text
             */

            $position = strpos($banertext, ' ');
            $firstHalf = substr($banertext, 0, $position);
            $secondHalf = substr($banertext, $position + 1);

            $line = Image::canvas(155, 2, $txtColor);

            return Image::canvas(300, 250)->text($firstHalf, 148, 31, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/BodoniMTCondensedItalic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(35);
            })->text($secondHalf, 150, 61, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/BodoniMTCondensedItalic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(35);
            })->insert($line, 'top', 0, 77);

        }
        else if ($pos == 'rectangle-seminar') {

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

            return Image::canvas(300, 250)->text($first, 11, 68, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/GillSansUltraBold.ttf'));
                $font->color($txtColor);
                $font->align('left');
                $font->valign('middle');
                $font->size(32);
            })->text($second, 11, 111, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/GillSansUltraBold.ttf'));
                $font->color($txtColor);
                $font->align('left');
                $font->valign('middle');
                $font->size(32);
            })->text($third, 11, 155, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/GillSansUltraBold.ttf'));
                $font->color($txtColor);
                $font->align('left');
                $font->valign('middle');
                $font->size(32);
            });

        }
        else if ($pos == 'rectangle-shopping') {

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

            return Image::canvas(300, 250)->text($first, 12, 78, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/BodoniMT-Bold.ttf'));
                $font->color($txtColor);
                $font->align('left');
                $font->valign('middle');
                $font->angle(15);
                $font->size(90);
            })->text($second, 25, 152, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/BodoniMT-Bold.ttf'));
                $font->color($txtColor);
                $font->align('left');
                $font->valign('middle');
                $font->angle(15);
                $font->size(90);
            });

        }

    }


    public function addFollText($banertext, $color, $pos)
    {
        /**
         * function adds follow txt
         */

        if (empty($banertext) || $pos == 'rectangle-thai') {
            return Image::canvas(300, 250);
        }

        if ($pos == 'rectangle-kismetrics') {

            if (strstr($banertext, ' ') && str_word_count($banertext) >= 5) {
                $c = str_word_count($banertext, 1);
                $firstHalf = $c[0] . ' ' . $c[1] . ' ' . $c[2] . ' ' . $c[3];
                $length = strlen($firstHalf);
                $secondHalf = substr($banertext, $length + 1);
            } else {
                $firstHalf = $banertext;
                $secondHalf = null;
            }


            return Image::canvas(300, 250)->text($firstHalf, 18, 142, function ($font) use ($color) {
                $font->file(public_path('fonts/MyriadProItalic.ttf'));
                $font->color($color);
                $font->align('left');
                $font->valign('middle');
                $font->size(16.5);
            })->text($secondHalf, 18, 159, function ($font) use ($color) {
                $font->file(public_path('fonts/MyriadProItalic.ttf'));
                $font->color($color);
                $font->align('left');
                $font->valign('middle');
                $font->size(16.5);
            });
        } else if ($pos == 'rectangle-get-around') {

            /**
             * Get Around Rectangle Banner follow text
             */

            return Image::canvas(300, 250)->text($banertext, 150, 152, function ($font) use ($color) {
                $font->file(public_path('fonts/OpenSans-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(9);
            });

        }
        else if ($pos == 'rectangle-airplane') {

            /**
             * Airplane Rectangle Banner follow text
             */

            return Image::canvas(300, 250)->text($banertext, 150, 240, function ($font) use ($color) {
                $font->file(public_path('fonts/MyriadProItalic.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(9);
            });

        }
        else if ($pos == 'rectangle-iphone') {

            /**
             * rectangle-iphone banner type
             */

            return Image::canvas(300, 250)->text($banertext, 7, 72, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($color);
                $font->align('left');
                $font->valign('middle');
                $font->size(34);
            });

        }
        else if ($pos == 'rectangle-antivirus') {

            /**
             * rectangle-antivirus banner type
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

            return Image::canvas(300, 250)->text($firstHalf, 281, 92, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-Regular.ttf'));
                $font->color($color);
                $font->align('right');
                $font->valign('middle');
                $font->size(34);
            })->text($secondHalf, 279, 135, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-Regular.ttf'));
                $font->color($color);
                $font->align('right');
                $font->valign('middle');
                $font->size(38);
            });

        }
        else if ($pos == 'rectangle-iphoneblue') {

            /**
             * rectangle-iphone-blue banner type
             */

            return Image::canvas(300, 250)->text($banertext, 152, 168, function ($font) use ($color) {
                $font->file(public_path('fonts/Arimo-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(37);
            });

        }
        else if ($pos == 'rectangle-medicine') {

            /**
             * rectangle-medicine banner type
             */

            return Image::canvas(300, 250)->text($banertext, 22, 95, function ($font) use ($color) {
                $font->file(public_path('fonts/Myriad-Pro-Bold-Italic.ttf'));
                $font->color($color);
                $font->align('left');
                $font->valign('middle');
                $font->size(46);
            });

        }
        else if ($pos == 'rectangle-digimon') {

            /**
             * rectangle-digimon banner type
             */

            return Image::canvas(300, 250)->text($banertext, 290, 197, function ($font) use ($color) {
                $font->file(public_path('fonts/Myriad-Pro-Bold-Italic.ttf'));
                $font->color($color);
                $font->align('right');
                $font->valign('middle');
                $font->size(13);
            });

        }

        else if ($pos == 'rectangle-jewels') {

            /**
             * Jewels Rectangle Banner follow text
             */


            return Image::canvas(300, 250)->text($banertext, 150, 88, function ($font) use ($color) {
                $font->file(public_path('fonts/RobotoCondensed-Regular.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(13);
            });

        }
        else if ($pos == 'rectangle-seminar') {

            /**
             * UI seminar follow text
             */
            $points3 = array(
                171, 0, // D
                300, 132, // C
                300,  137,      // Point B
                166,  0   // Point A
            );
            $points2 = array(
                186, 0, // D
                300, 117, // C
                300,  122,      // Point B
                181,  0   // Point A
            );
            $points = array(
                200, 0, // D
                300, 102, // C
                300,  107, // Point B
                195,  0   // Point A
            );


            $line = Image::canvas(300, 250)
                ->polygon($points, function ($draw) use ($color) {
                    $draw->background($color);
                })
                ->polygon($points2, function ($draw) use ($color) {
                    $draw->background($color);
                })
                ->polygon($points3, function ($draw) use ($color) {
                    $draw->background($color);
                });

            return Image::canvas(300, 250)->text($banertext, 12, 208, function ($font) use ($color) {
                $font->file(public_path('fonts/CopperplateGothicBold.ttf'));
                $font->color($color);
                $font->align('left');
                $font->valign('middle');
                $font->size(18);
            })->insert($line);

        }
        else if ($pos == 'rectangle-shopping') {

            /**
             * rectangle  shopping follow text
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

            return Image::canvas(300, 250)->text($firstHalf, 20, 192, function ($font) use ($color) {
                $font->file(public_path('fonts/ACaslonPro-Italic.otf'));
                $font->color($color);
                $font->align('left');
                $font->valign('middle');
                $font->size(12);
            })->text($secondHalf, 20, 206, function ($font) use ($color) {
                $font->file(public_path('fonts/ACaslonPro-Italic.otf'));
                $font->color($color);
                $font->align('left');
                $font->valign('middle');
                $font->size(12);
            })->text($third, 25, 220, function ($font) use ($color) {
                $font->file(public_path('fonts/ACaslonPro-Italic.otf'));
                $font->color($color);
                $font->align('left');
                $font->valign('middle');
                $font->size(12);
            });

        }


    }


    public function addButton($text, $color, $btcolor, $type)
    {

        /**
         * generate button for kismetrics rectangle type
         */

       if (empty($text) || $type == 'rectangle-get-around' || $type == 'rectangle-jewels'
           || $type == 'rectangle-seminar') {
           return Image::canvas(182, 34);
       }
       else if ($type == 'rectangle-kismetrics') {

           // define polygon points
           $points = array(
               15, 190,    // H
               156, 190, // G
               158, 193, // F
               158, 225,  //E
               156, 227,  //D X: D=G Y: D=C
               15, 227, // C X: C=H Y: C=D
               13, 225, //B X: A=B Y: B=E
               13, 193   //A X: A=B Y: A=F
           );

        return Image::canvas(300, 250)
               ->polygon($points, function ($draw) use ($btcolor) {
                   $draw->background($btcolor);
               })->text($text, 90, 220, function ($font) use ($color) {
                   $font->file(public_path('fonts/IstokWeb-Bold.ttf'));
                   $font->size(14);
                   $font->color($color);
                   $font->align('center');
               });


        } else if ($type == 'rectangle-airplane') {
            return Image::canvas(300, 250)
                ->rectangle(0, 195, 300, 230, function ($draw) use ($btcolor) {
                    $draw->background($btcolor);
                })
                ->opacity(50)
                ->text($text, 150, 212, function ($font) use ($color) {
                    $font->file(public_path('fonts/MyriadProSemibold.ttf'));
                    $font->size(13);
                    $font->color($color);
                    $font->valign('middle');
                    $font->align('center');
                });

        }
        else if ($type == 'rectangle-iphone') {
            return Image::canvas(300, 250)
                ->rectangle(0, 215, 300, 250, function ($draw) use ($btcolor) {
                    $draw->background($btcolor);
                })
                ->text($text, 150, 243, function ($font) use ($color) {
                    $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                    $font->size(21.5);
                    $font->color($color);
                    $font->align('center');
                });

        }
        else if ($type == 'rectangle-antivirus'){

            $position = strpos($text, ' ');

            $firstHalf = substr($text, 0, $position);
            $secondHalf = substr($text, $position +1);

           return Image::canvas(300, 250)->circle(53, 77, 177, function ($draw) use ($btcolor){
                   $draw->background($btcolor);
               })->text(' > ', 77, 177, function ($font) use ($color){
               $font->file(public_path('fonts/PTM55FT.ttf'));
               $font->color($color);
               $font->size(60);
               $font->align('center');
               $font->valign('middle');
           })->text('CLICK HERE', 80, 220, function ($font) use ($btcolor){
               $font->file(public_path('fonts/Roboto-Bold.ttf'));
               $font->color($btcolor);
               $font->size(18);
               $font->align('center');
               $font->valign('middle');
           }) ->circle(198, 275, 268, function ($draw) use ($btcolor){
               $draw->background($btcolor);
           })->text($secondHalf, 265, 237, function ($font) use ($color) {
               $font->file(public_path('fonts/Lato-Bold.ttf'));
               $font->size(16);
               $font->color($color);
               $font->align('center');
               $font->valign('bottom');
           })->text($firstHalf, 238, 209, function ($font) use ($color) {
                   $font->file(public_path('fonts/Roboto-Regular.ttf'));
                   $font->size(32);
                   $font->color($color);
                   $font->align('center');
                   $font->valign('middle');
                   $font->angle(20);
               });


        }
        else if ($type == 'rectangle-iphoneblue'){

            return Image::canvas(300, 250)->rectangle(96, 197, 201, 237, function ($draw) use ($color) {
                $draw->border(2, $color);
            })->text($text, 150, 216, function ($font) use ($color) {
                $font->file(public_path('fonts/Arimo-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(21);
            });
        }
        else if ($type == 'rectangle-thai') {

            /**
             * rectangle-thai banner type
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

            return Image::canvas(300, 250)
                ->circle(181, 150, 125, function ($draw) use ($btcolor){
                    $draw->background($btcolor);
                })
                ->opacity(90)
                ->text($firstHalf, 150, 100, function ($font) use ($color) {
                    $font->file(public_path('fonts/BodoniMTCondensedBoldItalic.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(46);
                })
                ->text($secondHalf, 150, 126, function ($font) use ($color) {
                    $font->file(public_path('fonts/BodoniMTCondensedBoldItalic.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(42);
                })
                ->text($third, 146, 164, function ($font) use ($color) {
                    $font->file(public_path('fonts/BodoniMTCondensedBoldItalic.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(50);
                });
        }
        else if ($type == 'rectangle-medicine') {

            /** Rectangle medicine banner button */

            return Image::canvas(300, 250)
                ->rectangle(0, 210, 300, 250, function ($draw) use ($btcolor) {
                    $draw->background($btcolor);
                })
                ->text($text, 150, 243, function ($font) use ($color) {
                    $font->file(public_path('fonts/Myriad-Pro-Bold-Italic.ttf'));
                    $font->size(31);
                    $font->color($color);
                    $font->align('center');
                });

        }
        else if ($type == 'rectangle-digimon') {

            /**
             * rectangle-digimon button type
             */

            return Image::canvas(300, 250)
                ->rectangle(0, 210, 300, 250, function ($draw) use ($btcolor) {
                    $draw->background($btcolor);
                })
                ->text($text, 150, 230, function ($font) use ($color) {
                    $font->file(public_path('fonts/CenturyGothicBold.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(32);
                });

        }
        else if ($type == 'rectangle-shopping') {

            /**
             * leaderboard-shopping button type
             */

            // define polygon points
            $points = array(
                171, 184,    // H
                280, 184, // G
                282, 187, // F
                282, 229,  //E
                280, 231,  //D X: D=G Y: D=C
                171, 231, // C X: C=H Y: C=D
                169, 229, //B X: A=B Y: B=E
                169, 187   //A X: A=B Y: A=F
            );

            return Image::canvas(300, 250)
                ->polygon($points, function ($draw) use ($color) {
                    $draw->border(3, $color);
                })
                ->text($text, 229, 206, function ($font) use ($color) {
                    $font->file(public_path('fonts/BookAntiquaBoldItalic.ttf'));
                    $font->color($color);
                    $font->align('center');
                    $font->valign('middle');
                    $font->size(17);
                });

        }


    }

}
