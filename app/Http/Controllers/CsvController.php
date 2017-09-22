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

        $images = array();

        return view('makeown', compact('images'));
    }

    public function importCsv()
    {

        if (Input::hasFile('insCsv')) {
            $path = Input::file('insCsv')->getRealPath();

            $data = Excel::load($path, function ($reader) {
            })->get();


            if (!empty($data) && $data->count()) {

                $images = [];
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


                    if (empty($insert['banertype'])) {
                        continue;
                    }
                    if (!is_string($insert['banertype'])) {
                        return back()->with('error', 'Houston, we got a problem');
                    }


                    ## Banner method - create banner ##

                    $img = $this->makeBaner(
                        $insert['banertype'], $insert['image'],
                        $insert['maintext'], $insert['textcolor'], $insert['followtext'],
                        $insert['txtsize'], $insert['folltxtsize'],
                        $insert['newline']

                    );


                    $input['imagename'] = $img . $imgNo . time() . ".png";

                    $images[] = $img . $imgNo . time() . ".png";

                    $destinationPath = public_path('/images/csv');

                    $img->save($destinationPath . '/' . $input['imagename']);

                    $imgNo++;

                }

                return view('makeown', compact('images'))
                    ->with('success', 'Autobots roll-out! ');

            } else {
                return back()->with('error', 'file empty');
            }
        }

        return back()->with('error', 'Please insert file');

    }

    public function makeBaner($banertype, $imageUrl, $banertext, $txtColor, $banertextFollow, $txtSize, $follTxtSize, $newline)
    {
        if ($banertype == 'Leaderboard') {

            $clck = $this->addButton();
            $ln = $this->line($newline);
            $btt = $this->addTxt($banertext, $txtColor, $txtSize);

            return Image::make($imageUrl)
                ->fit(728, 90, function ($c) {
                    $c->upsize();
                })
                #->insert($btt, 'left', 45, 0)
                ->insert($btt)
//                ->text($banertext, 364, 45, function ($font) use ($txtColor, $txtSize) {
//                    $font->file(public_path('fonts/Capture_it_2.ttf'));
//                    $font->color($txtColor);
//                    $font->align('center');
//                    $font->valign('middle');
//                    $font->size($txtSize);
//                })
                ->text($banertextFollow, 676, 45, function ($font) use ($txtColor, $follTxtSize) {
                    $font->file(public_path('fonts/Caviar_Dreams_Bold.ttf'));
                    $font->color($txtColor);
                    $font->align('right');
                    $font->valign('middle');
                    $font->size($follTxtSize);
                });

        } else if ($banertype == 'Rectangle') {
            return Image::make($imageUrl)
                ->fit(300, 250, function ($sc) {
                    $sc->upsize();
                })
                ->text($banertext, 176, 89, function ($font) use ($txtColor, $txtSize) {
                    $font->file(public_path('fonts/Capture_it_2.ttf'));
                    $font->color($txtColor);
                    $font->align('center');
                    $font->size($txtSize);
                })
                ->text($banertextFollow, 150, 120, function ($font) use ($txtColor, $follTxtSize) {
                    $font->file(public_path('fonts/Caviar_Dreams_Bold.ttf'));
                    $font->color($txtColor);
                    $font->align('center');
                    $font->size($follTxtSize);
                });
        } else {
            return back()->with('error', 'UNKNOWN BANNER TYPE, PLEASE FILL CSV CORRECTLY');
        }


    }

//      ################################## see this later on ########################

    public function line($newline)
    {
        ## linija neuptorebljiva (LINE) GD driver ne prihvata width, napravicemo canvas image i na osnovu toga liniju :) ##

        return Image::canvas(190, 3, $newline);

    }

    public function addImage($imageUrl)
    {
        ## this function adds image 100% uradjeno ##

        return Image::make($imageUrl)
            ->fit(728, 90, function ($c) {
                $c->upsize();
            });
    }


    public function addTxt($banertext, $txtColor, $txtSize)
    {
            return Image::canvas(728,90)->text($banertext, 364, 45, function ($font) use ($txtColor, $txtSize) {
                $font->file(public_path('fonts/Capture_it_2.ttf'));
                $font->color($txtColor);
                $font->align('center');
                $font->valign('middle');
                $font->size($txtSize);
            });
    }


    public function addButton()
    {

        /*  THIS WILL GENERATE white BUTTON WITH black TEXT CENTERED, 60% OPACITY */

        return Image::canvas(120, 40)
            ->ellipse(120, 120, 60, 20, function ($draw) {
                $draw->background('#fff');
                $draw->border(6, '#fff');
            })
            ->opacity(60)
            ->text('Click me', 60, 30, function ($font) {
                $font->file(public_path('fonts/Capture_it_2.ttf'));
                $font->size(20);
                $font->color('#000');
                $font->align('center');
            });

    }


}
