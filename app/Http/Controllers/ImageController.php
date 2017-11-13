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

        switch (strtolower($bannertype)) {
            case 'leaderboard-car':
                $x = 728;
                $y = 90;

                $bpX = 20;
                $bpY = 0;
                $btnposition = 'right';

                $imgX = 180;
                $imgY = 90;
                $imgPos = 'left';

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

                $imgX = 550;
                $imgY = 90;
                $imgPos = 'right';

                $lead = new Leaderboard();
                $main = $lead->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $lead->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $lead->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;

            case 'leaderboard-get-around':
                $x = 728;
                $y = 90;

                $bpX = 0;
                $bpY = 0;
                $btnposition = 'right';

                $imgX = 550;
                $imgY = 90;
                $imgPos = 'right';

                $lead = new Leaderboard();
                $main = $lead->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $lead->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $lead->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;

            case 'leaderboard-iphone7':
                $x = 728;
                $y = 90;

                $bpX = 0;
                $bpY = 0;
                $btnposition = 'right';

                $imgX = 550;
                $imgY = 90;
                $imgPos = 'right';

                $lead = new Leaderboard();
                $main = $lead->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $lead->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $lead->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;

            case 'leaderboard-antivirus':
                $x = 728;
                $y = 90;

                $bpX = 0;
                $bpY = 0;
                $btnposition = 'right';

                $imgX = 550;
                $imgY = 90;
                $imgPos = 'right';

                $lead = new Leaderboard();
                $main = $lead->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $lead->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $lead->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;


            case 'leaderboard-iphone-blue':
                $x = 728;
                $y = 90;

                $bpX = 0;
                $bpY = 0;
                $btnposition = 'right';

                $imgX = 550;
                $imgY = 90;
                $imgPos = 'right';

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
                $imgX = 0;
                $imgY = 0;
                $imgPos = 'center';

                $rect = new Rectangle();
                $main = $rect->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $rect->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $rect->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;

            case 'rectangle-get-around' || 'rectangle-iphone':
                $x = 300;
                $y = 250;
                $bpX = 0;
                $bpY = 215;
                $imgX = 0;
                $imgY = 0;
                $imgPos = 'center';

                $rect = new Rectangle();
                $main = $rect->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $rect->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $rect->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;

            case 'rectangle-airplane':
                $x = 300;
                $y = 250;
                $bpX = 0;
                $bpY = 195;
                $imgX = 0;
                $imgY = 0;
                $imgPos = 'center';

                $rect = new Rectangle();
                $main = $rect->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $rect->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $rect->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;

            case 'rectangle-antivirus':
                $x = 300;
                $y = 250;

                $bpX = 50;
                $bpY = 50;
                $btnposition = 'center';

                $imgX = 50;
                $imgY = 50;
                $imgPos = 'center';

                $rect = new Rectangle();
                $main = $rect->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $rect->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $rect->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;
            case 'rectangle-iphoneblue':
                $x = 300;
                $y = 250;

                $bpX = 0;
                $bpY = 0;
                $btnposition = 'bottom';

                $imgX = 50;
                $imgY = 50;
                $imgPos = 'center';

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
                $imgX = 0;
                $imgY = 0;
                $imgPos = 'center';
                $btnposition = 'center';

                $skycraper = new Skycraper();
                $main = $skycraper->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $skycraper->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $skycraper->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;

            case 'skycraper-iphone7':
                $x = 160;
                $y = 600;

                $bpX = 80;
                $bpY = 0;
                $btnposition = 'bottom';

                $imgX = 160;
                $imgY = 375;
                $imgPos = 'bottom';

                $skycraper = new Skycraper();
                $main = $skycraper->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $skycraper->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $skycraper->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;
            case 'skycraper-airplane':
                $x = 160;
                $y = 600;

                $bpX = 80;
                $bpY = 40;
                $btnposition = 'bottom';

                $imgX = 160;
                $imgY = 375;
                $imgPos = 'bottom';

                $skycraper = new Skycraper();
                $main = $skycraper->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $skycraper->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $skycraper->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;

            case 'skycraper-get-around':
                $x = 160;
                $y = 600;

                $bpX = 80;
                $bpY = 40;
                $btnposition = 'bottom';

                $imgX = 160;
                $imgY = 375;
                $imgPos = 'bottom';

                $skycraper = new Skycraper();
                $main = $skycraper->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $skycraper->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $skycraper->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;

            case 'skycraper-iphone-blue':

                $x = 160;
                $y = 600;

                $bpX = 80;
                $bpY = 40;
                $btnposition = 'bottom';

                $imgX = 160;
                $imgY = 375;
                $imgPos = 'bottom';

                $sky = new Skycraper();
                $main = $sky->addText($x, $y, $banertext, $txtColor, $bannertype);
                $folow = $sky->addFollText($x, $y, $banertextFollow, $ftxtColor, $bannertype);
                $bt = $sky->addButton($btntext, $btnTextColor, $btcolor, $bannertype);

                break;
        }

        if ($imgExist && $useWhole == null) {

            $image = Image::make(Input::file('file_image'))
                ->crop($cropW, $cropH, $cropX1, $cropY1)
                ->fit($x, $y, function ($c) {
                    $c->upsize();
                });

            $img = Image::canvas($x, $y, $colorpicker)
                ->insert($image)
                ->insert($main, 'center')
                ->insert($bt, $btnposition, $bpX, $bpY)
                ->insert($folow, 'center');

        }
        else if ($imgExist && $useWhole == 'wholeImage') {

            $image = Image::make(Input::file('file_image'));

            if ($image->mime == 'image/png') {

                $image->fit($imgX, $imgY, function ($c) {
                    $c->upsize();
                });

            } else {
                $image->fit($x, $y, function ($c) {
                    $c->upsize();
                });

            }

            $img = Image::canvas($x, $y, $colorpicker)
                ->insert($image, $imgPos)
                ->insert($main, 'center')
//                ->insert($bt, $btnposition, $bpX, $bpY)
                ->insert($folow, 'center')
                ->insert($bt);

        } else if (!$imgExist) {

            $img = Image::canvas($x, $y, $colorpicker)
                ->insert($main, 'center')
                ->insert($folow, 'center')
                ->insert($bt);
//                ->insert($bt, $btnposition, $bpX, $bpY);
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
