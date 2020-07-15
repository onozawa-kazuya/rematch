@extends('layouts.front')

@section('title', 'トップページ')

@section('content')

    <div class="commentary">
        <img class="extinguisher" src="../../images/Nb6be6G9nf1bMVmVrOplhwTd6MqzXmPYvKTy0jvN.jpeg">
        <h2 class="commentaryTitle">ReMatChとは？</h2>
        <p class="commentaryText">ReMatChとは、消防用設備の業者様を一括で比較できるポータルサイト<br>
        ”新規顧客を獲得したい”<br>
        ”希望に合う業者を見つけたい”<br>
        物件のオーナー様・設備業者様のマッチングを目指します</p>
    </div>
    
    <div class="btn-wrapper">
        <button class="graybutton"><a href="{{ url('guest/userlist') }}">オーナー・管理会社様</a></button>
        <button class="graybutton"><a href="{{ url('user/mypage') }}">消防用設備点検業者様</a></button>
    </div>
　

@endsection