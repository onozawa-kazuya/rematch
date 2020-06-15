@extends('layouts.guest')

@section('title', '設備業者詳細')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-offset-1 mx-auto">
            <div class="card" style="width: 40rem;">
              <img src="#" class="card-img-top" alt="#">
              <div class="card-body text-center">
                <h5 class="card-title">会社名</h5>
                <p class="card-text">所在地</p>
                <p class="card-text">対応エリア</p>
                <p class="card-text">設立年月日</p>
                <p class="card-text">対応可能エリア</p>
                <p class="card-text">対応可能設備</p>
                <p class="card-text">対応可能建物種別</p>
                <p class="card-text">会社紹介</p>
                <a href="{{ url('guest/contactform')}}" class="btn btn-danger">お問い合わせ<br>ページ</a>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection