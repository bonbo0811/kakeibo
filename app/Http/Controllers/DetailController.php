<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class DetailController extends Controller
{

        //全部を取得
        public function list()
        {
            $user = \Auth::user();

            // 今月の初日と最終日を取得
            $start = carbon::now()->startOfMonth();
            $end = carbon::now()->endOfMonth();

            $date = carbon::now();

            // 一覧を取得->15件でページネート
            $lists = detail::where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->orderby('use_at','asc')->paginate(15);
            $sum = detail::where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->sum('price');
            // dd($sum);

            $genre = '全体';

            $lastyear = now()->subYear();

            $detete = detail::where('user_id',$user['id'])->whereDate('use_at','<',$lastyear)->delete();

            return view('kakeibo.list',compact('lists','sum','genre','date'));
        }

        //食費を取得
        public function eat()
        {
            $user= \Auth::user();

            // 今月の初日と最終日を取得
            $start = carbon::now()->startOfMonth();
            $end = carbon::now()->endOfMonth();

            $date = carbon::now();

            // 一覧を取得->15件でページネート
            $lists = detail::where('genre','eat')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->orderby('use_at','asc')->paginate(15);
            $sum = detail::where('genre','eat')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->sum('price');
            // dd($lists);

            $genre = '食費';

            return view('kakeibo.list',compact('lists','sum','genre','date'));
        }

        //日用品を取得
        public function daily()
        {
            $user= \Auth::user();

            // 今月の初日と最終日を取得
            $start = carbon::now()->startOfMonth();
            $end = carbon::now()->endOfMonth();

            $date = carbon::now();

            // 一覧を取得->15件でページネート
            $lists = detail::where('genre','daily')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->orderby('use_at','asc')->paginate(15);
            $sum = detail::where('genre','daily')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->sum('price');
            // dd($lists);

            $genre = '日用品';

            return view('kakeibo.list',compact('lists','sum','genre','date'));
        }

        //交際費を取得
        public function dat()
        {
            $user= \Auth::user();

            // 今月の初日と最終日を取得
            $start = carbon::now()->startOfMonth();
            $end = carbon::now()->endOfMonth();

            $date = carbon::now();

            // 一覧を取得->15件でページネート
            $lists = detail::where('genre','dat')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->orderby('use_at','asc')->paginate(15);
            $sum = detail::where('genre','dat')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->sum('price');
            // dd($lists);

            $genre = '交際費';

            return view('kakeibo.list',compact('lists','sum','genre','date'));
        }

        //仕事関係を取得
        public function wor()
        {
            $user= \Auth::user();

            // 今月の初日と最終日を取得
            $start = carbon::now()->startOfMonth();
            $end = carbon::now()->endOfMonth();

            $date = carbon::now();

            // 一覧を取得->15件でページネート
            $lists = detail::where('genre','wor')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->orderby('use_at','asc')->paginate(15);
            $sum = detail::where('genre','wor')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->sum('price');
            // dd($lists);

            $genre = '仕事関係';

            return view('kakeibo.list',compact('lists','sum','genre','date'));
        }

        //光熱費などを取得
        public function uti()
        {
            $user= \Auth::user();

            // 今月の初日と最終日を取得
            $start = carbon::now()->startOfMonth();
            $end = carbon::now()->endOfMonth();

            $date = carbon::now();

            // 一覧を取得->15件でページネート
            $lists = detail::where('genre','uti')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->orderby('use_at','asc')->paginate(15);
            $sum = detail::where('genre','uti')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->sum('price');
            // dd($lists);

            $genre = '光熱費など';

            return view('kakeibo.list',compact('lists','sum','genre','date'));
        }

        //交通費を取得
        public function mov()
        {
            $user= \Auth::user();

            // 今月の初日と最終日を取得
            $start = carbon::now()->startOfMonth();
            $end = carbon::now()->endOfMonth();

            $date = carbon::now();

            // 一覧を取得->15件でページネート
            $lists = detail::where('genre','mov')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->orderby('use_at','asc')->paginate(15);
            $sum = detail::where('genre','mov')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->sum('price');
            // dd($lists);

            $genre = '交通費';

            return view('kakeibo.list',compact('lists','sum','genre','date'));
        }

        //その他を取得
        public function etc()
        {
            $user= \Auth::user();

            // 今月の初日と最終日を取得
            $start = carbon::now()->startOfMonth();
            $end = carbon::now()->endOfMonth();

            $date = carbon::now();

            // 一覧を取得->15件でページネート
            $lists = detail::where('genre','etc')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->orderby('use_at','asc')->paginate(15);
            $sum = detail::where('genre','etc')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->sum('price');

            $genre = 'その他';

            // $lastyear = carbon::now()->subYear()->toDateString();
            // dd($lastyear);

            // $lists = detail::where('user_id',$user['id'])->where('use_at','<','lastyear')->paginate(15);

            return view('kakeibo.list',compact('lists','sum','genre','date'));
        }
    

        //趣味・娯楽費を取得
        public function ent()
        {
            $user= \Auth::user();

            // 今月の初日と最終日を取得
            $start = carbon::now()->startOfMonth();
            $end = carbon::now()->endOfMonth();

            $date = carbon::now();
            
            // 一覧を取得->15件でページネート
            $lists = detail::where('genre','ent')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->orderby('use_at','asc')->paginate(15);
            $sum = detail::where('genre','ent')->where('user_id',$user['id'])->wherebetween('use_at',[$start,$end])->sum('price');
            // dd($list);

            $genre = '趣味、娯楽費';

            return view('kakeibo.list',compact('lists','sum','genre','date'));
        }

        //内容入力メソッド
        public function store(Request $request)
        {

            // バリデーション
            $validate = $request ->validate([
                'name' => 'required | string | max: 100',
                'price' => 'required | integer |',
                'use_at' => 'required | '
            ],
            // バリデーションメッセージ
            [
                'name.required' => '入力は必須です。',
                'name.max' => '入力は100文字までです。',
                'price.required' => '入力は必須です。',
                'price.integer' => '数字で入力してください。',
                'use_at.required' => '日付を入力してください。'
            ]);

            $data = $request->all();
            // dd($data);

            $detail_id = detail::create
            ([
                'genre' => $data['genre'],
                'name' => $data['name'],
                'price' => $data['price'],
                'user_id' => $data['user_id'],
                'use_at' => $data['use_at']
            ]);

            return redirect()-> route('list');
        }


    // 編集ページへ
    public function edit($id)
        {
            $detail = detail::find($id);

            $date = carbon::now();

            return view('kakeibo.edit',compact('detail','date'));
        }

    //内容変更メソッド
    public function change(Request $request,$id)
    {
        // バリデーション
        $validate = $request ->validate([
            'name' => 'required | string | max: 100',
            'price' => 'required | integer |',
            'use_at' => 'required | '
        ],
        // バリデーションメッセージ
        [
            'name.required' => '入力は必須です。',
            'name.max' => '入力は100文字までです。',
            'price.required' => '入力は必須です。',
            'price.integer' => '数字で入力してください。',
            'use_at.required' => '日付を入力してください。'
        ]);

        $data = $request->all();
        // dd($data);

        $detail = detail::find($id);

            $detail -> genre = $data['genre'];
            $detail -> name = $data['name'];
            $detail -> price = $data['price'];
            $detail -> use_at = $data['use_at'];

        $detail -> save();

        return redirect()-> route('list');
    }
    

    // 削除メソッド
    public function delete($id)
    {
        $detail = detail::find($id);
        // dd($detail);
        
        $detail ->delete();

        return redirect()->route('list');
    }
}
