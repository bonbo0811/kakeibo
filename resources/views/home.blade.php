@extends('layouts.app')

@section('content')
<div class="card h-100">
    <div class="row justify-content-center">
        <div class="col">
                <div class="card-header fw-bold" style="background-color:#FFFFEE;">{{ __('カケイボ！でお金を管理しよう！') }}</div>
                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mt-4 fw-bold">
                        {{ Auth::user()->name }}{{ ('さん、はじめまして') }}
                    </div>

                    <div class="mt-4 fw-bold">
                        {{ ('『カケイボ！』をご利用くださいありがとうございます。') }}
                    </div>

                    <div class="mt-4 fw-bold">
                        {{ ('まずは右の「お金を管理する」から今日使ったお金を記録してみましょう！') }}
                    </div>

                    <div class="mt-4 fw-bold">
                        {{ ('中央の「詳しくみる」からは今月使ったお金の内容を全体だけでなく')}}<br>
                        {{ ('それぞれのジャンルで確認することもできます。') }}
                    </div>
                    
                    <div class="mt-4 fw-bold">
                        {{('お金を使いすぎない様に節約を心がけましょう！！')}}
                    </div>
                    
                    
                </div>
        </div>
    </div>
</div>
@endsection
