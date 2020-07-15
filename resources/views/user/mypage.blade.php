@extends('layouts.user')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2 class="mypageTitle">MyPage</h2>
                <h3 class="subTitle">お問い合わせ一覧</h3>
                
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>日時</th>
                      <th>お問い合わせ種別</th>
                      <th>氏名</th>
                      <th>連絡先</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($contacts as $contactlist)
                        <tr>
                          <td>{{ $contactlist->created_at }}</td>
                          <td>{{ $contactlist->type }}</td>
                          <td>{{ $contactlist->name }}</td>
                          <td>{{ $contactlist->email }}</td>
                          <td class="text-center"><a href="{{ route('contact_detail', ['id' => $contactlist->id]) }}" class="btn btn-secondary">詳細</a></td>
                        </tr>
                    　@endforeach
                  </tbody>
                </table>
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
@endsection

