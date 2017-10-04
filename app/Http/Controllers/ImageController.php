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

        switch (strtolower($pos)) {
            case 'center':
                $tX = 364;
                $tY = 30;
                break;

            case 'left':
                $tX = 151;
                $tY = 30;
                break;

            case 'right':
                $tX = 546;
                $tY = 30;
                break;
        }

        return Image::canvas($x, $y)->text($banertext, $tX, $tY, function ($font) use ($txtColor) {
            $font->file(public_path('fonts/160MKA.ttf'));
            $font->color($txtColor);
            $font->align('center');
            $font->valign('middle');
            $font->size(32);
        })->blur(2);

    }

    public function addDaFollText($x, $y, $banertext, $pos)
    {
        ## function adds txt ##

        switch (strtolower($pos)) {
            case 'center':
                $tX = 364;
                $tY = 57;
                break;

            case 'left':
                $tX = 151;
                $tY = 57;
                break;

            case 'right':
                $tX = 546;
                $tY = 57;
                break;
        }

        return Image::canvas($x, $y)->text($banertext, $tX, $tY, function ($font) {
            $font->file(public_path('fonts/160MKA.ttf'));
            $font->color('#fff');
            $font->align('center');
            $font->valign('middle');
            $font->size(25);
        })->blur(1);

    }

    public function addDaButton($text, $color)
    {

        ## generate white button with black txt centered, opacity: 60% ##

        if (empty($text)) {
              return Image::canvas(182, 40);
          } else {

            return Image::canvas(182, 40)
                ->ellipse(182, 182, 91, 20, function ($draw) {
                    $draw->background('#fff');
                    $draw->border(4, '#fff');
                })
                ->opacity(60)
                ->text($text, 91, 28, function ($font) use ($color) {
                    $font->file(public_path('fonts/Caviar_Dreams_Bold.ttf'));
                    $font->size(16);
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
        $button = $request->input('button');
        $btntext = $request->input('btntext');
        $img = $request->input('file_image');
        $imgExist = $request->input('image');
        $useWhole = $request->input('wholeImage');
        $alignement = $request->input('txtAlign');
        $btnposition = $request->input('btnposition');
     #   dd($alignement);

        $banertextFollow = $request->input('banertextFollow');

        $txtColor = $request->input('textColor');
        $btnTextColor = $request->input('btnTextColor');

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
            case 'leaderboard':
                $x = 728;
                $y = 90;
                break;
            case 'rectangle':
                $x = 300;
                $y = 250;
                break;
            case 'skycraper':
                $x = 120;
                $y = 600;
                break;
        }

        $main = $this->addDaText($x, $y, $banertext, $txtColor, $alignement);
        $folow = $this->addDaFollText($x, $y, $banertextFollow, $alignement);
        $bt = $this->addDaButton($btntext, $btnTextColor);
        $img = Image::make(Input::file('file_image'))
                    ->crop($cropW, $cropH, $cropX1, $cropY1)
                    ->fit($x, $y, function ($c) {
                        $c->upsize();
                    })
                ->insert($main, 'center')
                ->insert($bt, $btnposition, 30, 0)
                ->insert($folow, 'center');

// Banee
//        if ($imgExist && $useWhole == null) {
//            $img = Image::make(Input::file('file_image'))
//                ->crop($cropW, $cropH, $cropX1, $cropY1)
//                ->fit($x, $y, function ($c) {
//                    $c->upsize();
//                })
//                ->insert($mainText, 'center')
//                ->insert($btn, $btnposition, 45, 0);
//
//        } else if ($imgExist) {
//            $img = Image::make(Input::file('file_image'))
//                ->fit($x, $y, function ($c) {
//                    $c->upsize();
//                })
//                ->insert($mainText, 'center')
//                ->insert($btn, $btnposition, 45, 0);
//        } else {
//
//            $img = Image::canvas($x, $y)
//                ->fill($colorpicker)
//                ->insert($mainText, 'center')
//                ->insert($btn, $btnposition, 45, 0);
//
//        }

        #save and proceed

        $input['imagename'] = $img . "bc" . time() . ".png";

        $destinationPath = public_path('/images');

        $img->save($destinationPath . '/' . $input['imagename']);

        return back()->with('imageName', $input['imagename'])->with('success', ' Click button to confirm!');

    }

}