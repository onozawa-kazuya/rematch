@extends('layouts.guest')

@section('title', '設備業者詳細')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-offset-1 mx-auto">
            <div class="card" style="width: 40rem;">
                @if($userlist->image_path)
                <img src="{{ asset('storage/image/' . '$userlist->image_path') }}" class="card-img-top">
                @else
                <p>No image</p>
                @endif
              
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $userlist->company }}</h5>
                    <p class="card-text">{{ $userlist->phone }}</p>
                    <p class="card-text">{{ $userlist->email }}</p>
                    <p class="card-text">{{ $userlist->establishment }}</p>
                    <p class="card-text">{{ $userlist->area }}</p>
                    <p class="card-text">{{ $userlist->equipment }}</p>
                    <p class="card-text">{{ $userlist->building }}</p>
                    <p class="card-text">{{ $userlist->introduction }}</p>
                    <a href="{{ url('guest/contactform')}}" class="btn btn-danger">お問い合わせ<br>ページ</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection