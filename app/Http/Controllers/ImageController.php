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
    public function leaderButtonText($btntext, $btnTextColor, $btnColor)
    {
        return Image::canvas(156, 40, $btnColor)->text($btntext, 70, 28, function ($font) use ($btnTextColor) {
            $font->file(public_path('fonts/CaviarDreams.ttf'));
            $font->size(18);
            $font->color($btnTextColor);
            $font->align('center');
        });

    }

    public function rectangleButtonText($btntext, $btnColor, $btnTextColor)
    {

        return Image::canvas(100, 40, $btnColor)->text($btntext, 50, 25, function ($font) use ($btnTextColor) {
            $font->file(public_path('fonts/CaviarDreams.ttf'));
            $font->size(16);
            $font->color($btnTextColor);
            $font->align('center');

        });

    }

    public function leaderboardBanerText($img, $banertext, $txtColor, $banertextFollow)
    {
        return $img->text($banertext, 196, 26, function ($font) use ($txtColor) {
            $font->file(public_path('fonts/Capture_it_2.ttf'));
            $font->color($txtColor);
            $font->align('center');
            $font->size(21);
        })->text($banertextFollow, 196, 42, function ($font) {
            $font->file(public_path('fonts/Caviar_Dreams_Bold.ttf'));
            $font->color('#000');
            $font->align('center');
            $font->size(16);
        });

    }

    public function rectangleBanerText($img, $banertext, $txtColor, $banertextFollow)
    {

        return $img->text($banertext, 120, 80, function ($font) use ($txtColor) {
            $font->file(public_path('fonts/Capture_it_2.ttf'));
            $font->color($txtColor);
            $font->align('center');
            $font->size(18);
        })->text($banertextFollow, 120, 100, function ($font) {
            $font->file(public_path('fonts/Caviar_Dreams_Bold.ttf'));
            $font->color('#000');
            $font->align('center');
            $font->size(16);
        });

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

        $banertype = $request->input('bannertemplate');
        $colorpicker = $request->input('colorpicker');
        $banertext = $request->input('banertext');
        $button = $request->input('button');
        $btntext = $request->input('btntext');
        $img = $request->input('file_image');
        $imgExist = $request->input('image');

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


        if ($imgExist && $banertype == 'Leaderboard') {

            $img = Image::make(Input::file('file_image'))->crop($cropW, $cropH, $cropX1, $cropY1)->fit(468, 58);

            switch ($button) {
                case "blueAndWhite":
                    #blue and white button text goes here
                    $btnColor = '#00C7D5';
                    $watermark = $this->leaderButtonText($btntext, $btnTextColor, $btnColor);
                    break;

                case "greenAndWhite":
                    #   green and white button TEXT GOES HERE
                    $btnColor = '#A0E048';
                    $watermark = $this->leaderButtonText($btntext, $btnTextColor, $btnColor);
                    break;

                default:
                    #   white button TEXT GOES HERE
                    $btnColor = '#fff';
                    $watermark = $this->leaderButtonText($btntext, $btnTextColor, $btnColor);
            }

            # BANNER TEXT GOES HERE

            $this->leaderboardBanerText($img, $banertext, $txtColor, $banertextFollow)->insert($watermark, 'right', 10, 10);

        } else if ($imgExist && $banertype == 'Rectangle') {

            $img = Image::make(Input::file('file_image'))->crop($cropW, $cropH, $cropX1, $cropY1)->fit(219, 183);

            switch ($button) {
                case "blueAndWhite":

                    ## here is turqouise button, with white button text
                    $btnColor = '#00C7D5';
                    $watermark = $this->rectangleButtonText($btntext, $btnColor, $btnTextColor);
                    break;

                case "greenAndWhite":
                    # here is green button with white button text

                    $btnColor = '#A0E048';
                    $watermark = $this->rectangleButtonText($btntext, $btnColor, $btnTextColor);
                    break;

                default:

                    # here is white button with blue button text
                    $btnColor = '#fff';
                    $watermark = $this->rectangleButtonText($btntext, $btnColor, $btnTextColor);

            }

            $this->rectangleBanerText($img, $banertext, $txtColor, $banertextFollow)->insert($watermark, 'bottom-left', 15, 15);

        } /*
             * Insert blank canvas.
             * Fill canvas with color
             * Add main banner text
             * Add button and button text
             *
             * @var array
             * return result
             */

        else if (!$imgExist && $banertype == 'Leaderboard') {

            $img = Image::canvas(468, 58)->fill($colorpicker);

            switch ($button) {
                case "blueAndWhite":

                    $btnColor = '#00C7D5';
                    $watermark = $this->leaderButtonText($btntext, $btnTextColor, $btnColor);
                    break;

                case "greenAndWhite":
                    #   green and white button TEXT GOES HERE

                    $btnColor = '#A0E048';
                    $watermark = $this->leaderButtonText($btntext, $btnTextColor, $btnColor);
                    break;

                default:
                    #   white button TEXT GOES HERE

                    $btnColor = '#fff';
                    $watermark = $this->leaderButtonText($btntext, $btnTextColor, $btnColor);

            }

            $this->leaderboardBanerText($img, $banertext, $txtColor, $banertextFollow)->insert($watermark, 'right', 10, 10);

        } else if (!$imgExist && $banertype == 'Rectangle') {
            $img = Image::canvas(219, 183)->fill($colorpicker);

            switch ($button) {
                case "blueAndWhite":

                    ## here is turqouise button, with white button text

                    $btnColor = '#00C7D5';
                    $watermark = $this->rectangleButtonText($btntext, $btnColor, $btnTextColor);
                    break;

                case "greenAndWhite":
                    # here is green button with white button text

                    $btnColor = '#A0E048';
                    $watermark = $this->rectangleButtonText($btntext, $btnColor, $btnTextColor);
                    break;

                default:

                    # here is white button with blue button text

                    $btnColor = '#fff';
                    $watermark = $this->rectangleButtonText($btntext, $btnColor, $btnTextColor);

            }

            #here is canvas with color and main banner text

            $this->rectangleBanerText($img, $banertext, $txtColor, $banertextFollow)->insert($watermark, 'bottom-left', 15, 15);


        }

        #save and proceed

        $input['imagename'] = time() . '.' . $img;

        $destinationPath = public_path('/images');

        $img->save($destinationPath . '/' . $input['imagename']);

        return back()->with('imageName', $input['imagename'])->with('success', ' Click button to confirm!');


    }

}