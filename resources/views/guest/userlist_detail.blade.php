@extends('layouts.guest')

@section('title', '設備業者詳細')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            
            <div class="card">
                <div class="card-header">
                    <h2 class="contentTitle">業者詳細ページ</h2>
                </div>
                
                <div class="card-body">
                    @if(isset($userlist->image_path))
                    <img src="{{ $userlist->image_path }}" class="card-img-top">
                    @else
                    <p>No image</p>
                    @endif
                    
                    <table class="table">
                        <tr>
                            <th>会社名:</th>
                            <td>{{ $userlist->company }}</td>
                        </tr>
                        <tr>
                            <th>電話番号:</th>
                            <td>{{ $userlist->phone }}</td>
                        </tr>
                        <tr>
                            <th>所在地:</th>
                            <td>{{ $userlist->address }}</td>
                        </tr>
                        <tr>
                            <th>設立年月日:</th>
                            <td>{{ $userlist->establishment }}</td>
                        </tr>
                        <tr>
                            <th>対応可能エリア:</th>
                            <td>{{ $userlist->area }}</td>
                        </tr>
                        <tr>
                            <th>対応可能設備:</th>
                            <td>
                            @foreach(explode(',', $userlist->equipment) as $equipment)
                            {{ Config::get('equipments')[$equipment] }}/
                            @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>建物種別:</th>
                            <td>{{ $userlist->building }}</td>
                        </tr>
                        <tr>
                            <th>自己紹介欄:</th>
                            <td>{{ $userlist->introduction }}</td>
                        </tr>
                    </table>
                    <a href="{{ url('guest/contactform/' . $userlist->id) }}" class="btn btn-secondary">お問い合わせ<br>ページ</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection