@extends('layouts.app')

@section('content')
<div class="card h-100">
    <div class="card-header d-flex" style="background-color:#FFFFEE;">編集<a class='ml-auto'><i class="fas fa-plus-circle"></i></a></div>
        <div class="card-body py-2 px-4 mb-3">
            <h4 class="mt-3 mb-3">{{ date('Y年 n月 j日',strtotime($detail->use_at)) }}　{{ $detail->name }}</h4>
            <form class="ms-2 mt-1" method="post" action=" {{ route('change',['id'=>$detail->id]) }} ">
                @csrf
                    <div class="col-md-5">
                        {{ __('ジャンル') }}
                        <br>
                            <select class="form-control mb-2 mt-1" name="genre">
                                <option value="eat" {{ old('genre', $detail->genre) === 'eat' ? 'selected' : ''}}>食費</option>
                                <option value="daily" {{ old('genre', $detail->genre) === 'daily' ? 'selected' : ''}}>日用品</option>
                                <option value="dat" {{ old('genre', $detail->genre) === 'dat' ? 'selected' : ''}}>交際費</option>
                                <option value="wor" {{ old('genre', $detail->genre) === 'wor' ? 'selected' : ''}}>仕事関係</option>
                                <option value="uti" {{ old('genre', $detail->genre) === 'uti' ? 'selected' : ''}}>光熱費など</option>
                                <option value="mov" {{ old('genre', $detail->genre) === 'mov' ? 'selected' : ''}}>交通費</option>
                                <option value="ent" {{ old('genre', $detail->genre) === 'ent' ? 'selected' : ''}}>趣味・娯楽費</option>
                                <option value="etc" {{ old('genre', $detail->genre) === 'etc' ? 'selected' : ''}}>その他</option>
                            </select>
                    </div><!-- class="col-md-8"> -->

                    <div class="col-md-5">
                        {{ __('詳細') }}
                            <br>
                                <input type="text" name="name" class="mb-2 form-control mt-1" value="{{ old('name' , $detail->name) }}">
                                    @if($errors->has('name'))
                                        @foreach($errors->get('name') as $message)
                                            <p class="small text-danger">→ {{ $message }} </p>
                                        @endforeach
                                    @endif 
                    </div><!-- class="col-md-8"> --> 


                    <div class="col-md-5">
                        {{ __('金額') }}
                        <br>
                        <div class="col-md-12 d-flex flex-row">
                            <div class="col-md-12 d-flex flex-row">
                                <input type="number" name="price" class="mb-2 form-control mt-1" value="{{ old('name' , $detail->price) }}">
                            </div>
                                <span class="p-2">円</span>
                            </div>
                        <div>
                            @if($errors->has('price'))
                                @foreach($errors->get('price') as $message)
                                    <p class="small text-danger">→ {{ $message }} </p>
                                @endforeach
                            @endif 
                        </div>
                    </div>

                    <div class="col-md-5">
                        {{ __('日付') }}
                        <br>
                        <input type="date" name="use_at" class="mb-0 form-control mt-1" value="{{ old('name' , $detail->use_at) }}" ><span class="ms-2">
                        @if($errors->has('use_at'))
                            @foreach($errors->get('use_at') as $message)
                                <p class="small text-danger">→ {{ $message }} </p>
                            @endforeach
                        @endif 
                    </div><!--  class="col-md-8"> -->

                    <div class="col-md-8 mt-1">
                            <button type="submit"  class="btn btn-primary">
                                {{ __('編集する') }}
                            </button>
                    </div><!-- class="col-md-8"> -->
            </form>
            <div class="mt-3 mb-1 col-md-5 text-end">
                <form method="post" action="{{ route('delete',['id' => $detail->id]) }}">
                    @csrf
                    <input type="hidden" name="id">
                    <button type="submit" class="btn-sm btn-warning text-decoration-none">
                        削除
                    </button>
                </form>
            </div> <!--mt-1 mb-1 text-end-->
        </div>
    </div> 
</div>
@endsection