@extends('layouts.guest')

@section('title', 'お問い合わせ完了')

@section('content')

<div class="card text-center">
    <div class="card-header"></div>
        <div class="card-body">
          <h5 class="card-title">お問い合わせありがとうございました。</h5>
          <p class="card-text">設備業者から連絡致します。<br>今しばらくお待ちくださいませ。</p>
          <a href="{{ url('guest/userlist') }}" class="btn btn-secondary">業者一覧へ戻る</a>
        </div>
    <div class="card-footer text-muted"></div>
</div>



@endsection