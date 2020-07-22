@extends('layouts.guest')

@section('title', '設備業者一覧')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="text-center my-4">
            <h3 class="brown border p-2">業者検索</h3>
            </div>
        
            {!! Form::open(['url' => 'guest/userlist', 'method' => 'get']) !!}
            <div class="form-group">
                {!! Form::label('area', '対応エリア:') !!}
                {!! Form::select('area', ['指定なし' => '指定なし'] + Config::get('prefs'), '指定なし' ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('equipment', '設備:') !!}
                {!! Form::select('equipment', ['指定なし' => '指定なし'] + Config::get('equipments'), '指定なし') !!}
            </div>
            <div class="form-group">
                {!! Form::label('building', '建物種別:') !!}
                {!! Form::select('building', ['指定なし' => '指定なし'] + Config::get('buildings'), '指定なし') !!}
            </div>
            <div class="form-group">
                {!! Form::label('text', '設備業者名:') !!}
                {!! Form::text('company', '', ['class' => 'form-control', 'placeholder' => '例:（株）ReMatCh']) !!}
            </div>
            {!! Form::submit('検索', ['class' => 'btn btn-secondary btn-block']) !!}
            {!! Form::close() !!}
        </div>
      
        <div class="col-sm-9">
            <div class="text-center my-4">
                <h3 class="brown p-2">業者一覧</h3>
            </div>
            <div class="container">
                @if(!empty($posts))
                <table class="table">
                    <tbody>
                        <tr>
                            <th>業者名</th>
                            <th class="area">エリア</th>
                            <th>設備</th>
                            <th class="building">建物</th>
                        </tr>
    
                        @foreach($posts as $userlist)
                        <tr>
                            <td><a href="{{ route('userlist_detail', ['id' => $userlist->id]) }}">{{ $userlist->company }}</a></td>
                            <td>
                                @foreach(explode(',', $userlist->area) as $area)
                                <p>{{ $area }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach(explode(',', $userlist->equipment) as $equipment)
                                {{ Config::get('equipments')[$equipment] }}
                                @endforeach
                            </td>
                            <td>
                                @foreach(explode(',', $userlist->building) as $building)
                                <p>{{ $building }}</p>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection

