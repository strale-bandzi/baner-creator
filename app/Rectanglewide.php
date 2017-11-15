<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as Image;

class Rectanglewide extends Model
{

    public function addText($x, $y, $banertext, $txtColor, $pos){

        if (empty($banertext) || $pos == 'rectanglewide-get-around') {
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

    }

    public function addFollText($x, $y, $banertext, $color, $pos){

        if (empty($banertext) || $pos == 'rectanglewide-get-around') {
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

    }

    public function addButton($text, $color, $btcolor, $type){
        if (empty($text) || $type == 'rectanglewide-get-around') {
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

    }
}
