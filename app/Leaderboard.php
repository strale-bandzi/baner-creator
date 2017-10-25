<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as Image;


class Leaderboard extends Model
{
    public function addText($x, $y, $banertext, $txtColor, $pos)
    {
        ## function adds txt ##

        if (empty($banertext)) {
            return Image::canvas(728, 90);
        }

        if ($pos == 'leaderboard-car') {
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
            $tX = 174;
            $tY = 43;

            return Image::canvas($x, $y)->text($banertext, $tX, $tY, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/Myriad_Pro_Semibold_italic.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(39);
            });
        }
    }

    public function addFollText($x, $y, $banertext, $color, $pos)
    {
        ## function adds txt ##

        if(empty($banertext))
        {
            return Image::canvas(728, 90);
        }

        if($pos=='leaderboard-car')
        {
            $tX = 364;
            $tY = 51;

            if(strstr($banertext, '.'))
            {
                $position = strpos($banertext, '.');
                $firstHalf = substr($banertext, 0, $position+1);
                $secondHalf = substr($banertext, $position +1);
            }
            else if(strstr($banertext, ' ') &&  str_word_count($banertext) >= 3 ){
                $c = str_word_count($banertext, 1);
                $firstHalf = $c[0]. ' ' .$c[1];
                $length = strlen($firstHalf);
                $secondHalf = substr($banertext, $length+1);
            }
            else {
                $firstHalf = $banertext;
                $secondHalf = null;
            }


            return Image::canvas($x, $y)->text($firstHalf, $tX, $tY, function ($font) use ($color) {
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

        }
        else if($pos=='leaderboard-airplane')
        {
            $tX = 250;
            $tY = 75;

            return Image::canvas($x, $y)->text($banertext, $tX, $tY, function ($font) use ($color){
                $font->file(public_path('fonts/MyriadProItalic.ttf'));
                $font->color($color);
                $font->align('center');
                $font->valign('middle');
                $font->size(14);
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

        if($type=='leaderboard-car') {

            return Image::canvas(184, 34, $btcolor)
                ->text($text, 92, 24, function ($font) use ($color) {
                    $font->file(public_path('fonts/TitilliumWeb-Regular.ttf'));
                    $font->size(14);
                    $font->color($color);
                    $font->align('center');
                });
        }
        else if($type=='leaderboard-airplane')
        {
            return Image::canvas(122, 90, $btcolor)
                ->opacity(50)
                ->text($text, 61, 51, function ($font) use ($color) {
                    $font->file(public_path('fonts/MyriadProSemibold.ttf'));
                    $font->size(14);
                    $font->color($color);
                    $font->align('center');
                });

        }
    }
}
