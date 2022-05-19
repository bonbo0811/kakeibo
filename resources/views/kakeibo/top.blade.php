@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="mt-3"></div>
        <h1 class="mt-5 text-white fw-bolder">Kakeibo!を始めよう。 </h1>
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 fw-bold">
                        「Kakeibo!」とは？
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="col-md-9 mt-2 mb-3 m-auto">
                            <img src="{{ asset('images/toppic.png')}}" class="img-fluid border" alt="Kakeibo!のイメージ画像">
                        </div>
                        <div class="px-4 py-2 ms-4 me-4">
                            <p class="fw-bold">「Kakeibo!」は出費をジャンルごとに1カ月単位で管理できるクラウド家計簿のアプリです。</p>
                            <p class="fw-bold">Kakeibo!を使えば今月使ったお金を食費、日用品、交際費、光熱費などのジャンルに分け、今月いくら使ったかをすぐにいつでも登録し、簡単に確認出来ます。</p>
                            <p class="fw-bold">スマートフォンからだけでなくパソコン、タブレットからも楽々操作出が可能です。</p>
                        </div>
                        <div class="row mb-0 text-center">
                            <div>
                                <a href="{{ route('login') }}" class="me-1 btn btn-primary">ログイン</a>
                                <a href="{{ route('register') }}" class="ms-1 btn btn-primary">新規登録</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection