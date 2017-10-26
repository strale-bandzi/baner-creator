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

        if (empty($banertext)) {
            return Image::canvas(160, 600);
        }

        /**
         * Skycraper-antivirus banner type
         */

        if ($pos == 'skycraper-antivirus') {

            $tX = 80;
            $tY = 98;

            return Image::canvas($x, $y)->text($banertext, $tX, $tY, function ($font) use ($txtColor) {
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

            $tX = 80;
            $tY = 101;

            if(str_word_count($banertext) >= 3 ){
                $c = str_word_count($banertext, 1);
                $firstHalf = $c[0]. ' ' .$c[1];
                $length = strlen($firstHalf);
                $secondHalf = substr($banertext, $length+1);
            }

            return Image::canvas($x, $y)->text($firstHalf, $tX, $tY, function ($font) use ($txtColor) {
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
    }

    public function addFollText($x, $y, $banertext, $color, $pos)
    {
        /**
         * function adds follow txt
         */

        if (empty($banertext)) {
            return Image::canvas(160, 600);
        }

        if ($pos == 'skycraper-antivirus') {
            $tX = 80;
            $tY = 145;

            $position = strpos($banertext, ' ');    // position of first word

            $first = substr($banertext, 0, $position);  //gives first word
            $secondString = substr($banertext, $position); // Gives next 2 strings

            $secondPosition = strpos($secondString, ' ', 1);

            $second = substr($secondString, 0, $secondPosition); //gives second word
            $third = substr($secondString, $secondPosition); // gives third word


            return Image::canvas($x, $y)->text($first, $tX, $tY, function ($font) use ($color) {
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

            $tX = 80;
            $tY = 196;

            return Image::canvas($x, $y)->text($banertext, $tX, $tY, function ($font) use ($color) {
                $font->file(public_path('fonts/Roboto-BoldItalic.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(37);
            });

        }


    }

    public function addButton($text, $color, $btcolor, $type)
    {

        /**
         * generate button for skycraper types
         */


        if (empty($text)) {
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
    }
}
