<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Excel;
use Image;
use File;
use Session;

class CsvController extends Controller
{
    public function index()
    {

        return view('makeown');
    }

    public function importCsv()
    {

        if (Input::hasFile('insCsv')) {
            $path = Input::file('insCsv')->getRealPath();

            $data = Excel::load($path, function ($reader) {
            })->get();

            if (!empty($data) && $data->count()) {
                $imgNo = 0;

                foreach ($data as $key => $value) {

                    $insert = [
                        'banertype' => $value->banertype,
                        'image' => $value->image,
                        'maintext' => $value->maintext,
                        'textcolor' => $value->textcolor,
                        'followtext' => $value->followtext,
                        'txtsize' => $value->txtsize,
                        'folltxtsize' => $value->folltxtsize,
                        'newline' => $value->newline
                    ];


                    if (empty($insert['banertype']) || !is_string($insert['banertype'])) {
                        return back()->with('error', 'Houston, we got a problem');
                    }

                    ## Banner method - create banner ##

                    $img = $this->makeBaner(
                        $insert['banertype'], $insert['image'],
                        $insert['maintext'], $insert['textcolor'], $insert['followtext'],
                        $insert['txtsize'], $insert['folltxtsize'],
                        $insert['newline']

                    );


                    $input['imagename'] = $img . $imgNo . time();

                    $destinationPath = public_path('/images/csv');

                    $img->save($destinationPath . '/' . $input['imagename']);

                    $imgNo++;

                }

                return back()->with('imageName', $input['imagename'])->with('success', 'Autobots roll-out! ');

            } else {
                return back()->with('error', 'file empty');
            }
        }

        return back()->with('error', 'Please insert file');

    }

            public function makeBaner($banertype, $imageUrl, $banertext, $txtColor, $banertextFollow, $txtSize, $follTxtSize, $newline)
            {
                if ($banertype == 'Leaderboard') {

                    $watermark = Image::canvas(190, 3)->fill($newline);

                    return Image::make($imageUrl)
                        ->fit(728, 90, function($c){
                            $c->upsize();
                            })
                        ->insert($watermark, 'left', 45, 0)
                        ->text($banertext, 364, 45, function ($font) use ($txtColor, $txtSize)   {
                            $font->file(public_path('fonts/Capture_it_2.ttf'));
                            $font->color($txtColor);
                            $font->align('center');
                            $font->valign('middle');
                            $font->size($txtSize);
                        })
                        ->text($banertextFollow, 676, 45, function ($font) use ($txtColor, $follTxtSize){
                            $font->file(public_path('fonts/Caviar_Dreams_Bold.ttf'));
                            $font->color($txtColor);
                            $font->align('right');
                            $font->valign('middle');
                            $font->size($follTxtSize);
                        });

                }
                else if ($banertype == 'Rectangle') {
                    return Image::make($imageUrl)
                        ->fit(300, 250, function($sc){
                            $sc->upsize();
                            })
                        ->text($banertext, 176, 89, function ($font) use ($txtColor, $txtSize) {
                            $font->file(public_path('fonts/Capture_it_2.ttf'));
                            $font->color($txtColor);
                            $font->align('center');
                            $font->size($txtSize);
                        })
                        ->text($banertextFollow, 150, 120, function ($font) use($txtColor, $follTxtSize) {
                            $font->file(public_path('fonts/Caviar_Dreams_Bold.ttf'));
                            $font->color($txtColor);
                            $font->align('center');
                            $font->size($follTxtSize);
                        });
                }
                else {
                     return back()->with('error', 'UNKNOWN BANNER TYPE, PLEASE FILL CSV CORRECTLY');
                }


            }

//      ################################## see this later on ########################

    public function addImage($imageUrl)
    {
        return Image::make($imageUrl)
            ->fit(728, 90, function ($c) {
                $c->upsize();
            });
    }
//
//    public function addTxt($banertext, $txtColor, $imageUrl)
//    {
//        return $this->text($banertext, 176, 89, function ($font) use ($txtColor) {
//            $font->file(public_path('fonts/Capture_it_2.ttf'));
//            $font->color($txtColor);
//            $font->align('center');
//            $font->size(39);
//        });
//    }


}
