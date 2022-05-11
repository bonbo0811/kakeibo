<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Detail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = \Auth::user();

        $date = Carbon::now();

        // detailテーブルからログインしたユーザーとIDが一致したデータを取得
        $lists = detail::where('user_id',$user['id'])->get();
        // dd($lists);

        // データがなければhomeへ、あればlist(ルーティング)を返す。
            if ($lists->isEmpty()) {
                return view('home',compact('date'));
            }else{
                return redirect()->route('list');
            }
    }


}