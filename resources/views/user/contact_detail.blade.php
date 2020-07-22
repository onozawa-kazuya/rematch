@extends('layouts.user')

@section('title', 'お問い合わせ詳細')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h2 class="contentTitle">お問い合わせ内容</h2>
                </div>
                
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>お問い合わせ種別:</th>
                            <td>{{ $contactform->type }}</td>
                        </tr>
                        <tr>
                            <th>名前:</th>
                            <td>{{ $contactform->name }}</td>
                        </tr>
                        <tr>
                            <th>電話番号:</th>
                            <td>{{ $contactform->phone }}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス:</th>
                            <td>{{ $contactform->email }}</td>
                        </tr>
                        <tr>
                            <th>建物所在:</th>
                            <td>{{ $contactform->address }}</td>
                        </tr>
                        <tr>
                            <th>設備種類:</th>
                            <td>{{ $contactform->equipment }}</td>
                        </tr>
                        <tr>
                            <th>コメント:</th>
                            <td>{{ $contactform->comment }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
            