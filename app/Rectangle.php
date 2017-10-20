<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Intervention\Image\Facades\Image as Image;

class Rectangle extends Model
{
    public function addText($x, $y, $banertext, $txtColor, $pos)
    {
        ## function adds txt ##

        if(empty($banertext))
        { return Image::canvas(300, 250); }

        if ($pos=='rectangle-kismetrics')
        {
            /* Kismetrics rectangle banner */

            $tX = 150;
            $tY = 80;

            $position = strpos($banertext, ',');
            $firstHalf = substr($banertext, 0, $position +1); #will display text and comma
            $secondHalf = substr($banertext, $position +1); #will display text after comma

            return Image::canvas($x, $y)->text($firstHalf, $tX, $tY, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Gudea-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(28);
            })->text($secondHalf, 130, 110, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Gudea-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(28);
            });
        }

        else if ($pos == 'rectangle-get-around')
        {
            /*Get Around Rectangle Banner */

            $tX = 150;
            $tY = 66;
            $position = strpos($banertext, ' ');

            $firstHalf = substr($banertext, 0, $position);
            $secondHalf = substr($banertext, $position +1);

            $line = Image::canvas(180, 3, $txtColor);

            return Image::canvas($x, $y)->text($firstHalf, $tX, $tY, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Merriweather-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(40);
            })->text($secondHalf, 150, 106, function ($font) use ($txtColor){
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
        ## function adds txt ##

        if(empty($banertext))
        {
            return Image::canvas(728, 90);
        }


        if($pos== 'rectangle-kismetrics')
        {
            $tX = 120;
            $tY = 142;

            return Image::canvas($x, $y)->text($banertext, $tX, $tY, function ($font) use ($color){
                $font->file(public_path('fonts/MyriadProItalic.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(17);
            });
        }
        else if ($pos == 'rectangle-get-around')
        {
            /*Get Around Rectangle Banner follow text */

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

        ## generate white button with black txt centered, opacity: 60% ##

        if(empty($text))
        {
            return Image::canvas(182,34);
        }

        else if($type=='rectangle-kismetrics')
        {

            /* Finish button for kismetrics rectangle type */

            return Image::canvas(138, 39)
                ->ellipse(140.5, 142.2, 69.2, 19.5, function ($draw) use ($btcolor) {
                    $draw->background($btcolor);
                    $draw->border(2.8, $btcolor);
                })

//                ->circle(139.98, 68.95, 19.5, function ($draw) use ($btcolor){
//                    $draw->background($btcolor);
//                    #$draw->border($btcolor);
//                })
                ->sharpen(30)
                ->text($text, 70, 28, function ($font) use ($color){
                    $font->file(public_path('fonts/IstokWeb-Bold.ttf'));
                    $font->size(16);
                    $font->color($color);
                    $font->align('center');
                });

        }

    }

}
