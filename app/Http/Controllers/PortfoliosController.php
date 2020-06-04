<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfoliosController extends Controller
{
    public function setup(){
        $portfolio_entry =  Portfolio::firstWhere('user_id', Auth::id());
        if(!$portfolio_entry){
            Portfolio::create(['user_id'=>Auth::id(), 'username'=> Auth::user()->username]);
        }

        $portfolio_entry =  Auth::user()->portfolio;
        return view('predefined_portfolio.setup', compact('portfolio_entry'));
    }
    public function saveSettings(Request $request){
        $portfolio = Portfolio::firstWhere('user_id', Auth::id());
        $portfolio->theme = $request->theme;
        $portfolio->save();

        return redirect()->back()->with('success', "Settings saved.");

    }
    public function index($username){
        $portfolio_entry = Portfolio::firstWhere('username', $username);
        if($portfolio_entry){
            return view('predefined_portfolio.index', compact('portfolio_entry'));
        }
        abort(404);
    }
}
