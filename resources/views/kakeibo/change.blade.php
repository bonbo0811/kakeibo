@extends('layouts.app')

@section('content')
<div class="card h-100">
        <div class="card-header d-flex" style="background-color:#FFFFEE;">詳細<a class='ml-auto'><i class="fas fa-plus-circle"></i></a></div>
            <div class="card-body p-3">
                <h3 class="ms-4 mt-2 mb-3">
                    {{ $genre }}  ： {{ $sum }} 円
                </h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>内訳</th>
                                <th>金額</th>
                                <th>日付</th>
                            </tr>
                        </thead>
                            @foreach($lists AS $list)
                                <tr>
                                    <th>{{ $list->name }}</th>
                                    <th>{{ $list->price }} 円</th>
                                    <th>{{ date('n月j日',strtotime($list->created_at)) }}</th>
                                </tr>
                            @endforeach
                    </table>    
                    {{ $lists->links()}}
            </div> <!-- col-md-3 -->
</div>
@endsection