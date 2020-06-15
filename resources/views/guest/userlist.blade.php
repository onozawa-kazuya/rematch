@extends('layouts.guest')

@section('title', '設備業者一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>業者一覧</h1>
                
                <table class="table table-striped">
                  <tbody>
                    @foreach($posts as $userlist)
                    <tr>
                      <td scope="row">{{ $userlist->id }}</td>
                      <td>
                        @if ($userlist->image_path)
                        <img src="{{ asset('storage/image/' . $userlist->image_path) }}">
                        @else
                        <p>No image</p>
                        @endif
                        
                      </td>
                      <td>{{ \Str::limit($userlist->company,100) }}</td>
                      <td>{{ \Str::limit($userlist->address, 100) }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection