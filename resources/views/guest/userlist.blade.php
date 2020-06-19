@extends('layouts.guest')

@section('title', '設備業者一覧')

@section('content')
    <div class="row">
      <div class="col-sm-4">
        <div class="text-center my-4">
          <h3 class="brown border p-2">設備業者検索</h3>
        </div>
          {!! Form::open(['url' => 'guest.userlist', 'method' => 'get']) !!}
            <div class="form-group">
              {!! Form::label('area', '対応エリア:') !!}
              {!! Form::select('area', ['指定なし' => '指定なし'] + Config::get('prefs'), '指定なし' ) !!}
            </div>
            <div class="form-group">
              {!! Form::label('equipment', '設備:') !!}
              {!! Form::select('equipment', ['指定なし' => '指定なし'] + Config::get('equipments.'), '指定なし') !!}
            </div>
            <div class="form-group">
              {!! Form::label('building', '建物種別:') !!}
              {!! Form::select('building', ['指定なし' => '指定なし'] + Config::get('buildings.'), '指定なし') !!}
            </div>
            <div class="form-group">
              {!! Form::label('text', '設備業者名:') !!}
              {!! Form::text('company', '', ['class' => 'form-control', 'placeholder' => '指定なし']) !!}
            </div>
            {!! Form::submit('検索', 'btn btn-primary btn-block') !!}
            {!! Form::close() !!}
      </div>
      
      <div class="col-sm-8">
        <div class="text-center my-4">
          <h3 class="brown p-2">設備業者一覧</h3>
        </div>
        <div class="container">
          <!--検索ボタンが押されたら表示-->
          @if(!empty($posts))
          <div class="my-2 p-0">
            <div class="row border-bottom text-center">
              <div class="col-sm-3">
                <p>設備業者名</p>
              </div>
              <div class="col-sm-3">
                <p>対応エリア</p>
              </div>
              <div class="col-sm-3">
                <p>対応設備</p>
              </div>
              <div class="col-sm-3">
                <p>対応建物</p>
              </div>
            </div>
          @endif
          
            <!--検索条件に一致した業者を表示-->
            @foreach($posts as $userlist)
              <div class="row py-2 border-bottom text-center">
                <div class="col-sm-3">
                  <a href="{{ route('userlist_detail', ['id' => $userlist->id]) }}">{{ $userlist->company }}</a>
                </div>
                <div class="col-sm-3">
                  {{ $userlist->area }}
                </div>
                <div class="col-sm-3">
                  {{ $userlist->equipment }}
                </div>
                <div class="col-sm-3">
                  {{ $userlist->building }}
                </div>
              </div>
            @endforeach
          </div>
          {{ $posts->appends(request()->input())->render('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
@endsection