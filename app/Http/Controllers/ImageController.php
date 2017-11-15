<?php

namespace App\Http\Controllers;

use App\Skycraper;
use App\Leaderboard;
use App\Rectangle;
use App\Rectanglewide;
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

    /**
     * Collect data from FORM
     */

    public function store(Request $request)
    {
        /**
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

        $txtColor = $request->input('textColor');
        $ftxtColor = $request->input('FtextColor');

        $btnTextColor = $request->input('btnTextColor');
        $btcolor = $request->input('btnColor');

        /**
         * Crop image and return values (width, height, coordinates X and Y)
         */

        $cropW = round($request->input('w'));
        $cropH = round($request->input('h'));
        $cropX1 = round($request->input('x1'));
        $cropY1 = round($request->input('y1'));
//

        /**
         * Insert image
         * Add main and follow banner text
         * Pick text color
         * Add button, color and button text
         *
         * return result
         */

        $pos = strpos($bannertype, '-');
        $check = substr($bannertype, 0, $pos);

////        dd($check, $bannertype);
//
//        switch (strtolower($bannertype)) {
//            case 'leaderboard-car':
//                $x = 728;
//                $y = 90;
//
//                $bpX = 20;
//                $bpY = 0;
//                $btnposition = 'right';
//
//                $imgX = 180;
//                $imgY = 90;
//                $imgPos = 'left';
//                break;
//
//            case 'leaderboard-airplane':
//                $x = 728;
//                $y = 90;
//
//                $bpX = 0;
//                $bpY = 0;
//                $btnposition = 'right';
//
//                $imgX = 550;
//                $imgY = 90;
//                $imgPos = 'right';
//                break;
//
//            case 'leaderboard-get-around':
//                $x = 728;
//                $y = 90;
//
//                $bpX = 0;
//                $bpY = 0;
//                $btnposition = 'right';
//
//                $imgX = 550;
//                $imgY = 90;
//                $imgPos = 'right';
//                break;
//
//            case 'leaderboard-iphone7':
//                $x = 728;
//                $y = 90;
//
//                $bpX = 0;
//                $bpY = 0;
//                $btnposition = 'right';
//
//                $imgX = 550;
//                $imgY = 90;
//                $imgPos = 'right';
//                break;
//
//            case 'leaderboard-antivirus':
//                $x = 728;
//                $y = 90;
//
//                $bpX = 0;
//                $bpY = 0;
//                $btnposition = 'right';
//
//                $imgX = 550;
//                $imgY = 90;
//                $imgPos = 'right';
//                break;
//
//
//            case 'leaderboard-iphone-blue':
//                $x = 728;
//                $y = 90;
//
//                $bpX = 0;
//                $bpY = 0;
//                $btnposition = 'right';
//
//                $imgX = 550;
//                $imgY = 90;
//                $imgPos = 'right';
//                break;
//
//
//            case 'rectangle-kismetrics':
//                $x = 300;
//                $y = 250;
//                $bpX = 15;
//                $bpY = 190;
//                $imgX = 0;
//                $imgY = 0;
//                $imgPos = 'center';
//                break;
//
//            case 'rectangle-get-around':
//                $x = 300;
//                $y = 250;
//                $bpX = 0;
//                $bpY = 215;
//                $imgX = 0;
//                $imgY = 0;
//                $imgPos = 'center';
//                break;
//            case 'rectangle-iphone':
//                $x = 300;
//                $y = 250;
//                $bpX = 0;
//                $bpY = 215;
//                $imgX = 0;
//                $imgY = 0;
//                $imgPos = 'center';
//                break;
//
//            case 'rectangle-airplane':
//                $x = 300;
//                $y = 250;
//
//                $bpX = 0;
//                $bpY = 20;
//                $btnposition = 'bottom'; //ovaj kod radi proveriti sa Ivanom
//
//                $imgX = 0;
//                $imgY = 0;
//                $imgPos = 'center';
//                break;
//
//            case 'rectangle-antivirus':
//                $x = 300;
//                $y = 250;
//
//                $bpX = 50;
//                $bpY = 50;
//                $btnposition = 'center';
//
//                $imgX = 50;
//                $imgY = 50;
//                $imgPos = 'center';
//                break;
//
//            case 'rectangle-iphoneblue':
//                $x = 300;
//                $y = 250;
//
//                $bpX = 0;
//                $bpY = 0;
//                $btnposition = 'bottom';
//
//                $imgX = 50;
//                $imgY = 50;
//                $imgPos = 'center';
//                break;
//
//
//            case 'skycraper-antivirus':
//                $x = 160;
//                $y = 600;
//                $bpX = 80;
//                $bpY = 280;
//                $imgX = 0;
//                $imgY = 0;
//                $imgPos = 'center';
//                $btnposition = 'center';
//                break;
//
//            case 'skycraper-iphone7':
//                $x = 160;
//                $y = 600;
//
//                $bpX = 80;
//                $bpY = 0;
//                $btnposition = 'bottom';
//
//                $imgX = 160;
//                $imgY = 375;
//                $imgPos = 'bottom';
//                break;
//
//            case 'skycraper-airplane':
//                $x = 160;
//                $y = 600;
//
//                $bpX = 80;
//                $bpY = 40;
//                $btnposition = 'bottom';
//
//                $imgX = 160;
//                $imgY = 375;
//                $imgPos = 'bottom';
//                break;
//
//            case 'skycraper-get-around':
//                $x = 160;
//                $y = 600;
//
//                $bpX = 80;
//                $bpY = 40;
//                $btnposition = 'bottom';
//
//                $imgX = 160;
//                $imgY = 375;
//                $imgPos = 'bottom';
//                break;
//
//            case 'skycraper-iphoneblue':
//
//                $x = 160;
//                $y = 600;
//
//                $bpX = 80;
//                $bpY = 40;
//                $btnposition = 'bottom';
//
//                $imgX = 160;
//                $imgY = 375;
//                $imgPos = 'bottom';
//                break;
//        }

        /** GENERATOR BLOCK OF CODE */

        if ($check == 'leaderboard') {
            $x = 728;
            $y = 90;
            $lead = new Leaderboard();
            $main = $lead->addText($x, $y, $banertext, $txtColor, $bannertype);
            $folow = $lead->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
            $bt = $lead->addButton($btntext, $btnTextColor, $btcolor, $bannertype);
        } else if ($check == 'rectangle') {
            $x = 300;
            $y = 250;
            $rect = new Rectangle();
            $main = $rect->addText($x, $y, $banertext, $txtColor, $bannertype);
            $folow = $rect->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
            $bt = $rect->addButton($btntext, $btnTextColor, $btcolor, $bannertype);
        } else if ($check == 'skycraper') {
            $x = 160;
            $y = 600;
            $sky = new Skycraper();
            $main = $sky->addText($x, $y, $banertext, $txtColor, $bannertype);
            $folow = $sky->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
            $bt = $sky->addButton($btntext, $btnTextColor, $btcolor, $bannertype);
        }
        else if ($check == 'rectanglewide') {
            $x = 240;
            $y = 400;

            $rctw = new Rectanglewide();
            $main = $rctw->addText($x, $y, $banertext, $txtColor, $bannertype);
            $folow = $rctw->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
            $bt = $rctw->addButton($btntext, $btnTextColor, $btcolor, $bannertype);
        }

        /*** */

        if ($imgExist && $useWhole == null) {

            $image = Image::make(Input::file('file_image'))
                ->crop($cropW, $cropH, $cropX1, $cropY1)
                ->fit($x, $y, function ($c) {
                    $c->upsize();
                });

            $img = Image::canvas($x, $y, $colorpicker)
                ->insert($image)
                ->insert($main, 'center')
                ->insert($bt)
                ->insert($folow, 'center');

            /**$img = Image::canvas($x, $y, $colorpicker)
            ->insert($image)
            ->insert($main, 'center')
            ->insert($bt, $btnposition, $bpX, $bpY)
            ->insert($folow, 'center');*/

        } else if ($imgExist && $useWhole == 'wholeImage') {

            $image = Input::file('file_image');
            $image2 = Image::make($image);

//            if ($image->mime == 'image/png') {
//
//                $image->fit($imgX, $imgY, function ($c) {
//                $c->upsize();
//            });
//
//            } else {
//                $image->fit($x, $y, function ($c) {
//                $c->upsize();
//                });
//
//            }

//            $img = Image::canvas($x, $y)
//                ->insert($image, $imgPos)
//                ->insert($main, 'center')
//                ->insert($bt, $btnposition, $bpX, $bpY)
//                ->insert($folow, 'center');

            $img = Image::canvas($x, $y)
                ->insert($image2)
                ->insert($main)
                ->insert($bt)
                ->insert($folow);


        } else if (!$imgExist) {

            $img = Image::canvas($x, $y, $colorpicker)
                ->insert($main)
                ->insert($bt)
                ->insert($folow);
//            $img = Image::canvas($x, $y, $colorpicker)
//                ->insert($main, 'center')
//                ->insert($bt, $btnposition, $bpX, $bpY)
//                ->insert($folow, 'center');
        }


        /**
         *save and proceed
         */

        $input['imagename'] = $img . 'bc' . time() . '.jpg';

        $destinationPath = public_path('/images');

        $img->save($destinationPath . '/' . $input['imagename']);

        return back()->with('imageName', $input['imagename'])->with('success', ' Click button to confirm!');

    }

}
