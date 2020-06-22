@extends('layouts.user')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>お問い合わせ一覧</h2>
                
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>お問い合わせ種別</th>
                      <th>氏名</th>
                      <th>連絡先</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($contacts as $contactlist)
                        <tr>
                          <th scope="row"></th>
                          <td>{{ $contactlist->type }}</td>
                          <td>{{ $contactlist->name }}</td>
                          <td>{{ $contactlist->email }}</td>
                          <td class="text-center"><a href="#" class="btn btn-secondary">詳細</a></td>
                        </tr>
                    　@endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


