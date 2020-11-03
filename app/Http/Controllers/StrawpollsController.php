<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class StrawpollsController extends Controller
{
    public function showAllStrawpolls()
    {
        $user = Auth::user();

        if ($user->status == 1) { // Jeigu adminas, gauna visus balsavimus

            $strawpolls = DB::table('strawpoll')->get();

            return view('pages.all-strawpolls')->with('strawpolls', $strawpolls);

        } else { // Jeigu paprastas vartotojas, gauna visus balsavimus kuriuos jis sukure

            $strawpolls = DB::table('strawpoll')->where('creator', $user->username)->get();

            return view('pages.all-strawpolls')->with('strawpolls', $strawpolls);
        }
    }

    public function showAboutStrawpoll($id)
    {
        $user = Auth::user();

        $creator = DB::table('strawpoll')->select('creator')->where('id', $id)->get();


        if ($creator->isEmpty()) { // Jeigu per url keicia id, ir toks puslapis neegzistuoja

            return view('pages.unauthorized');

        } else {


            if ($creator[0]->creator == $user->username) { // Tikrina ar prisijunges vartotojas yra balsavimo kurejas

                $aboutStrawpoll = DB::table('strawpoll')->where('id', $id)->get();

                return view('pages.about-strawpoll')->with('strawpoll', $aboutStrawpoll);

            } else if ($user->status == 1) { // Jeigu prisijunges vartotojas yra adminas

                $aboutStrawpoll = DB::table('strawpoll')->where('id', $id)->get();

                return view('pages.about-strawpoll')->with('strawpoll', $aboutStrawpoll);

            } else { // Jeigu vartotojas nera balsavimo kurejas ir jei isai nera administratorius

                return view('pages.unauthorized');

            }
        }
    }
}
