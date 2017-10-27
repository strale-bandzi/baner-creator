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

            $tX = 150;
            $tY = 66;
            $position = strpos($banertext, ' ');

            $firstHalf = substr($banertext, 0, $position);
            $secondHalf = substr($banertext, $position + 1);

            $line = Image::canvas(180, 3, $txtColor);

            return Image::canvas($x, $y)->text($firstHalf, $tX, $tY, function ($font) use ($txtColor) {
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

            $tX = 150;
            $tY = 152;

            return Image::canvas($x, $y)->text($banertext, $tX, $tY, function ($font) use ($color) {
                $font->file(public_path('fonts/OpenSans-Bold.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(9);
            });

        }

    }


    public function addButton($text, $color, $btcolor, $type)
    {

        /**
         * generate button for kismetrics rectangle type
         */

        if (empty($text)) {
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

        }else if ($type == 'rectangle-get-around') {

            return Image::canvas(145, 40);
        }

    }

}
