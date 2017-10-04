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
                        'newline' => $value->newline,
                        'textalign' => $value->textalign,
                        'btnposition' => $value->btnposition,
                        'buttontext'    => $value->buttontext
                    ];


                    if (empty($insert['banertype'])) {
                        continue;
                    }
                    if (!is_string($insert['banertype'])) {
                        return back()->with('error', 'Banertype must be a string');
                    }

                    ## Banner method - create banner ##

                    $img = $this->makeBaner(
                        $insert['banertype'], $insert['image'],
                        $insert['maintext'], $insert['textcolor'], $insert['followtext'],
                        $insert['txtsize'], $insert['folltxtsize'],
                        $insert['newline'], $insert['textalign'], $insert['btnposition'],
                        $insert['buttontext']
                    );


                   ### this one works: $img = $this->addTxt( $insert['maintext'], $insert['textcolor'], $insert['txtsize'] ); ###

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
//
    public function makeBaner($banertype, $imageUrl, $banertext, $txtColor, $banertextFollow, $txtSize, $follTxtSize, $newline, $txtAlign, $btnPosition, $btnText)
    {
        if (strtolower($banertype) == 'leaderboard') {

            # if leaderboard define size #
            $xSize = 728; $ySize = 90;

            # if main txt align == something, do this #

            switch (strtolower($txtAlign)) {
                case 'center':
                    $txtAlignX = 364;
                    $txtAlignY = 45;
                    break;
                case 'left':
                    $txtAlignX = 140;
                    $txtAlignY = 45;
                    break;
                case 'right':
                    $txtAlignX = 588;
                    $txtAlignY = 45;
                    break;
            }

            $clck = $this->addButton($btnText, $txtColor);

            $ln = $this->line($newline);

            $mainText = $this->addTxt($xSize, $ySize, $banertext, $txtColor, $txtSize, $txtAlignX, $txtAlignY);

            return Image::make($imageUrl)
                ->fit($xSize, $ySize, function ($c) {
                    $c->upsize();
                })
                ->insert($clck, $btnPosition, 45, 0)
                ->insert($mainText);


//                ->text($banertextFollow, 676, 45, function ($font) use ($txtColor, $follTxtSize) {
//                    $font->file(public_path('fonts/Caviar_Dreams_Bold.ttf'));
//                    $font->color($txtColor);
//                    $font->align('right');
//                    $font->valign('middle');
//                    $font->size($follTxtSize);
//                });

        }

        else if (strtolower($banertype) == 'rectangle') {

            $clck = $this->addButton($btnText, $txtColor);

            $xSize = 300; $ySize = 250;

            switch (strtolower($txtAlign)) {
                    case 'up':
                        $txtAlignX = 150;
                        $txtAlignY = 50;
                      break;
                    case 'center':
                        $txtAlignX = 150;
                        $txtAlignY = 125;
                        break;
                    case 'down':
                        $txtAlignX = 150;
                        $txtAlignY = 200;
                        break;
                default:
                    $txtAlignX = 150;
                    $txtAlignY = 200;
//                    ## pogledati sutra ovaj deo kada korisnik ne unese nikakve podatke ##
            }


            $mainText = $this->addTxt($xSize, $ySize, $banertext, $txtColor, $txtSize, $txtAlignX, $txtAlignY);

            return Image::make($imageUrl)
                    ->fit($xSize, $ySize, function ($sc) {
                    $sc->upsize();
                })
                ->insert($clck, $btnPosition, 75, 25)
                ->insert($mainText);

//                ->text($banertextFollow, 150, 120, function ($font) use ($txtColor, $follTxtSize) {
//                    $font->file(public_path('fonts/Caviar_Dreams_Bold.ttf'));
//                    $font->color($txtColor);
//                    $font->align('center');
//                    $font->size($follTxtSize);
//                });
        } else {
            return back()->with('error', 'Unknown banner type, please fill csv correctly.');
        }


    }

    ################################## see this later on ########################

    public function line($newline)
    {
        ## GD driver doesn't support line()->width, here we made canvas width: 3px in user-customized color ##

        return Image::canvas(190, 3, $newline);

    }

    public function addImage($imageUrl)
    {
        ## function adds image  ##

        return Image::make($imageUrl)
            ->fit(728, 90, function ($c) {
                $c->upsize();
            });
    }


    public function addTxt($x, $y, $banertext, $txtColor, $txtSize, $txtX, $txtY)
    {

        ## function adds txt ##

        return Image::canvas($x,$y)->text($banertext, $txtX, $txtY, function ($font) use ($txtColor, $txtSize) {
            $font->file(public_path('fonts/Capture_it_2.ttf'));
            $font->color($txtColor);
            $font->align('center');
            $font->valign('middle');
            $font->size($txtSize);
        });

    }


    public function addButton($text, $color)
    {

        ## generate white button with black txt centered, opacity: 60% ##
        if (!empty($text)) {

               return Image::canvas(120, 40)
                   ->ellipse(120, 120, 60, 20, function ($draw) use ($color) {
                       $draw->background($color);
                       $draw->border(6, $color);
                   })
                   ->opacity(60)
                   ->text($text, 60, 32, function ($font) {
                       $font->file(public_path('fonts/Capture_it_2.ttf'));
                       $font->size(24);
                       $font->color('#000');
                       $font->align('center');
                   });

        }

        else {
            return Image::canvas(120, 40);
        }
    }

    ## Follow text NOT finished##

    public function addFollowTxt($x, $y, $text, $txtColor, $txtSize, $txtX, $txtY)
    {

        ## function adds txt ##

        return Image::canvas($x,$y)->text($text, $txtX, $txtY, function ($font) use ($txtColor, $txtSize) {
            $font->file(public_path('fonts/Capture_it_2.ttf'));
            $font->color($txtColor);
            $font->align('center');
            $font->valign('middle');
            $font->size($txtSize);
        });

    }



}
