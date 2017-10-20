<?php

namespace App\Http\Controllers;

use App\Skycraper;
use App\Leaderboard;
use App\Rectangle;
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
     * returns ingredients for banner
    */

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
                $bpX = 20;
                $bpY = 0;
                $btnposition = 'right';

                $lead = new Leaderboard();
                $main = $lead->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $lead->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $lead->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;
            case 'leaderboard-airplane':
                $x = 728;
                $y = 90;
                $bpX = 0;
                $bpY = 0;
                $btnposition = 'right';

                $lead = new Leaderboard();
                $main = $lead->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $lead->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $lead->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;
            case 'rectangle-kismetrics':
                $x = 300;
                $y = 250;
                $bpX = 15;
                $bpY = 190;

                $rect = new Rectangle();
                $main = $rect->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $rect->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $rect->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;

            case 'rectangle-get-around':
                $x = 300;
                $y = 250;
                $bpX = 15;
                $bpY = 190;

                $rect = new Rectangle();
                $main = $rect->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $rect->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $rect->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;

            case 'skycraper-antivirus':
                $x = 160;
                $y = 600;
                $bpX = 80;
                $bpY = 280;
                $btnposition = 'center';

                $skycraper = new Skycraper();
                $main = $skycraper->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $skycraper->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $skycraper->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;
        }

        if($imgExist && $useWhole==null)
        {
                    $img = Image::make(Input::file('file_image'))
                            ->crop($cropW, $cropH, $cropX1, $cropY1)
                            ->fit($x, $y, function ($c) {
                                    $c->upsize();
                            })
                            ->insert($main, 'center')
                            ->insert($bt, $btnposition, $bpX, $bpY)
                            ->insert($folow, 'center');
        }
        else if($imgExist && $useWhole == 'wholeImage')
        {

            $slika = Image::make(Input::file('file_image'))
                ->fit(180, 90, function ($c) {
                    $c->upsize();
                });

            $img =  Image::canvas($x, $y, $colorpicker)
                ->insert($slika, 'left', 15, 5)
                ->insert($main, 'center')
                ->insert($bt, $btnposition, $bpX, $bpY)
                ->insert($folow, 'center');
        }
        else if(!$imgExist)
        {
            $img = Image::canvas($x, $y, $colorpicker)
                ->insert($main, 'center')
                ->insert($bt, $btnposition, $bpX, $bpY)
                ->insert($folow, 'center');
        }

        #save and proceed

        $input['imagename'] = $img . 'bc' . time() . '.jpg';

        $destinationPath = public_path('/images');

        $img->save($destinationPath . '/' . $input['imagename']);

        return back()->with('imageName', $input['imagename'])->with('success', ' Click button to confirm!');

    }

}