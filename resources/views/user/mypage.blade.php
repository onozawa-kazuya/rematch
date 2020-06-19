@extends('layouts.user')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>マイページ</h2>
                
                <table class="table table-stripe">
                    <thead>
                        <tr>
                            <td>お問い合わせ一覧</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contactlist)
                            <tr>
                                <td>{{ $contactlist->type }}</td>
                                <td>{{ $contactlist->name }}</td>
                                <td>{{ $contactlist->address }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                
            </div>
        </div>
    </div>
@endsection