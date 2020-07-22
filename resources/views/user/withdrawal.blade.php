@extends('layouts.user')

@section('title', '退会ページ')

@section('content')

    <div class="container">
　      <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">アカウント削除</h4>
                        <p class="card-text">退会しますか？</p>
                        <a class="btn btn-secondary" href="{{ route('withdrawal') }}" onclick="event.preventDefault();
                        document.getElementById('withdrawal-form').submit();">退会</a>
                        <form id="withdrawal-form" action="{{ route('withdrawal') }}" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection