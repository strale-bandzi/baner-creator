<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Intervention\Image\Facades\Image as Image;

class Rectangle extends Model
{
    /**
     * function adds main txt
     */

    public function addText($x, $y, $banertext, $txtColor, $pos)
    {

        if (empty($banertext)) {
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

            return Image::canvas($x, $y)->text($firstHalf, 18, 80, function ($font) use ($txtColor) {
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

            return Image::canvas($x, $y)->text($firstHalf, 150, 66, function ($font) use ($txtColor) {
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

            return Image::canvas($x, $y)->text($banertext, 150, 150, function ($font) use ($txtColor) {
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

            return Image::canvas($x, $y)->text($banertext, 107, 29, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(30);
            });

        }


    }


    public function addFollText($x, $y, $banertext, $color, $pos)
    {
        /**
         * function adds follow txt
         */

        if (empty($banertext)) {
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


            return Image::canvas($x, $y)->text($firstHalf, 18, 142, function ($font) use ($color) {
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

            return Image::canvas($x, $y)->text($banertext, 150, 152, function ($font) use ($color) {
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

            return Image::canvas($x, $y)->text($banertext, 150, 240, function ($font) use ($color) {
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

            return Image::canvas($x, $y)->text($banertext, 106, 72, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(34);
            });

        }

    }


    public function addButton($text, $color, $btcolor, $type)
    {

        /**
         * generate button for kismetrics rectangle type
         */

        if (empty($text) || $type == 'rectangle-get-around') {
            return Image::canvas(182, 34);
        } else if ($type == 'rectangle-kismetrics') {

            $width = 146;
            $height = 38;

            return Image::canvas(145, 40)
                ->circle($width, $width / 2 - 1, $height / 2, function ($draw) use ($btcolor) {
                    $draw->background($btcolor);
                    $draw->border($btcolor);
                })
                ->text($text, 70, 28, function ($font) use ($color) {
                    $font->file(public_path('fonts/IstokWeb-Bold.ttf'));
                    $font->size(14);
                    $font->color($color);
                    $font->align('center');
                });

        } else if ($type == 'rectangle-airplane') {
            return Image::canvas(300, 35, $btcolor)
                ->opacity(50)
                ->text($text, 150, 24, function ($font) use ($color) {
                    $font->file(public_path('fonts/MyriadProSemibold.ttf'));
                    $font->size(13);
                    $font->color($color);
                    $font->align('center');
                });

        }
        else if ($type == 'rectangle-iphone') {
            return Image::canvas(300, 35, $btcolor)
                ->text($text, 150, 28, function ($font) use ($color) {
                    $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                    $font->size(21.5);
                    $font->color($color);
                    $font->align('center');
                });

        }

    }

}
