<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Input;


class ImageController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    /*
     * Collect data from form.
     *
     * returns
    */

    public function addDaText($x, $y, $banertext, $txtColor, $pos)
    {
        ## function adds txt ##

        if(empty($banertext))
        { return Image::canvas(728, 90); }

        if ($pos=='leaderboard-car')
        {
            $tX = 364;
            $tY = 27;
            return Image::canvas($x, $y)->text($banertext, $tX, $tY, function ($font) use ($txtColor) {
                $font->file(public_path('fonts/TitilliumWeb-Bold.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size(28);
            });

        }
        else if ($pos=='leaderboard-airplane')
        {
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

    public function addDaFollText($x, $y, $banertext, $color, $pos)
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

            return Image::canvas($x, $y)->text($banertext, $tX, $tY, function ($font) use ($color) {
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

            return Image::canvas($x, $y)->text($banertext, $tX, $tY, function ($font) {
            $font->file(public_path('fonts/MyriadProItalic.ttf'));
            $font->color('#363636');
            $font->align('center');
            $font->valign('middle');
            $font->size(14);
        });

        }

    }

    public function addAnotherTxt($x, $y, $banertext, $color, $type)
    {
        ## function adds txt ##
        if(empty($banertext))
        {
            return Image::canvas(728, 90);
        }

        if($type == 'leaderboard-airplane'){ return Image::canvas(728, 90);}

        return Image::canvas($x, $y)->text($banertext, 364, 71, function ($font) use ($color) {
            $font->file(public_path('fonts/TitilliumWeb-Regular.ttf'));
            $font->color($color);
            $font->align('center');
            $font->valign('middle');
            $font->size(15);
        });
    }

    public function addDaButton($text, $color, $btcolor, $type)
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

  public function store(Request $request)
    {
        /*
         * Collect data from FORM
         * Validate first step
         *
         */

        $this->validate($request, [
            'bannertemplate' => 'required'
        ]);

        $bannertype = $request->input('bannertemplate');
        $colorpicker = $request->input('colorpicker');
        $banertext = $request->input('banertext');
        $btntext = $request->input('btntext');
        $imgExist = $request->input('image');
        $useWhole = $request->input('wholeImage');
        $btnposition = $request->input('btnposition');

        $banertextFollow = $request->input('banertextFollow');
        $banertextFollow2 = $request->input('banertextFollow2');

        $txtColor = $request->input('textColor');
        $ftxtColor = $request->input('FtextColor');

        $btnTextColor = $request->input('btnTextColor');
        $btcolor = $request->input('btnColor');

        /*
         * Crop image and return values (width, height, coordinates X and Y)
         */

        $cropW = round($request->input('w'));
        $cropH = round($request->input('h'));
        $cropX1 = round($request->input('x1'));
        $cropY1 = round($request->input('y1'));


        /*
         * Insert cropped image
         * Add main banner text
         * Add button and button text
         *
         * return result
         */

        switch (strtolower($bannertype)) {
            case 'leaderboard-car':
                $x = 728;
                $y = 90;
                $bp = 20;
                $btnposition = 'right';
                break;
            case 'leaderboard-airplane':
                $x = 728;
                $y = 90;
                $bp = 0;
                $btnposition = 'right';
                break;
        }

        $main = $this->addDaText($x, $y, $banertext, $txtColor, $bannertype);
        $folow = $this->addDaFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
        $folow2 = $this->addAnotherTxt($x, $y,$banertextFollow2, $ftxtColor, $bannertype);
        $bt = $this->addDaButton($btntext, $btnTextColor, $btcolor, $bannertype);

        if($imgExist && $useWhole==null)
        {
                    $img = Image::make(Input::file('file_image'))
                            ->crop($cropW, $cropH, $cropX1, $cropY1)
                            ->fit($x, $y, function ($c) {
                                    $c->upsize();
                            })
                            ->insert($main, 'center')
                            ->insert($bt, $btnposition, $bp, 0)
                            ->insert($folow, 'center')
                            ->insert($folow2, 'center');
        }
        else if($imgExist && $useWhole == 'wholeImage')
        {

            $slika = Image::make(Input::file('file_image'))
                ->fit(180, 90, function ($c) {
                    $c->upsize();
                });

            $img =  Image::canvas(728, 90, $colorpicker)
                ->insert($slika, 'left', 15, 5)
                ->insert($main, 'center')
                ->insert($bt, $btnposition, $bp, 0)
                ->insert($folow, 'center')
                ->insert($folow2, 'center');
        }
        else
        {
            $img = Image::canvas(728, 90, $colorpicker)
                ->insert($main, 'center')
                ->insert($bt, $btnposition, $bp, 0)
                ->insert($folow, 'center')
                ->insert($folow2, 'center');
        }

        #save and proceed

        $input['imagename'] = $img . 'bc' . time() . '.png';

        $destinationPath = public_path('/images');

        $img->save($destinationPath . '/' . $input['imagename']);

        return back()->with('imageName', $input['imagename'])->with('success', ' Click button to confirm!');

    }

}