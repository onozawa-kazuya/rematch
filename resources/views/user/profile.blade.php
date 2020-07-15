@extends('layouts.user')

@section('title', 'プロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <h3 class="profileTitle">プロフィール登録</h1>
                
                <div class="card">
                  <div class="card-header">Profile</div>
                      <div class="card-body">
                          <form method="post" action="{{ action('User\UserController@profilecreate') }}" enctype="multipart/form-data">
                              
                              <div class="form-group row @if(!empty($errors->first('company'))) has-error @endif">
                                  <label class="col-sm-2">会社名</label>
                                  <div class="col-sm-6">
                                      <input type="text" class="form-control" name="company" value="{{ old('company', $userlist->company )}}">
                                      <span class="help-block">{{ $errors->first('company') }}</span>
                                  </div>
                              </div>
                              
                              <div class="form-group row @if(!empty($errors->first('address'))) has-error @endif">
                                  <label class="col-sm-2">所在地</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="address" value="{{ old('address', $userlist->address) }}">
                                      <span class="help-block">{{ $errors->first('addres') }}</span>
                                  </div>
                              </div>
                              
                              <div class="form-group row @if(!empty($errors->first('phone'))) has-error @endif">
                                  <label class="col-sm-2">連絡先</label>
                                  <div class="col-sm-5">
                                      <input type="text" class="form-control" name="phone" value="{{ old('phone', $userlist->phone) }}">
                                      <span class="help-block">{{ $errors->first('phone') }}</span>
                                  </div>
                              </div>
                              
                              <div class="form-group row @if(!empty($errors->first('establishment'))) has-error @endif">
                                  <label class="col-sm-2">設立<br>年月日</label>
                                  <div class="col-sm-4">
                                      <input type="text" class="form-control" name="establishment" value="{{ old('establishment', $userlist->establishment) }}">
                                      <span class="help-block">{{ $errors->first('establishment') }}</span>
                                  </div>
                              </div>
                              <div class="form-group row @if(!empty($errors->first('area'))) has-error @endif">
                                  <label class="col-sm-2">対応可能<br>エリア</label>
                                  <div class="col-sm-3">
                                      <select class="form-control form-control-sm" name="area">
                                          <option value="">選択してください</option>
                                          @foreach(config('prefs') as $num => $pref)
                                             @if( explode(',', $userlist->area)[0] == $pref )
                                                 <option selected value="{{ $num }}">{{ $pref }}</option>
                                             @else
                                                 <option value="{{ $num }}">{{ $pref }}</option>
                                             @endif
                                          @endforeach
                                      </select>
                                      <span class="help-block">{{ $errors->first('area') }}</span>
                                  </div>
                                  <div class="col-sm-3">
                                      <select class="form-control form-control-sm" name="area2">
                                          <option value="">選択してください</option>
                                          @foreach(config('prefs') as $num => $pref)
                                             @if( explode(',', $userlist->area)[1] == $pref )
                                                 <option selected value="{{ $num }}">{{ $pref }}</option>
                                             @else
                                                 <option value="{{ $num }}">{{ $pref }}</option>
                                             @endif
                                          @endforeach
                                      </select>
                                  </div>
                                  <div class="col-sm-3">
                                      <select class="form-control form-control-sm" name="area3">
                                          <option value="">選択してください</option>
                                          @foreach(config('prefs') as $num => $pref)
                                             @if( explode(',', $userlist->area)[2] == $pref )
                                                 <option selected value="{{ $num }}">{{ $pref }}</option>
                                             @else
                                                 <option value="{{ $num }}">{{ $pref }}</option>
                                             @endif
                                          @endforeach
                                      </select>
                                  </div>
                                  
                              </div>
                              <div class="form-group row @if(!empty($errors->first('equipment'))) has-error @endif">
                                  <label class="col-sm-2">対応可能<br>設備</label>
                                  <div class="col-sm-3">
                                      <div class="custom-control custom-radio">
                                          <input {{ in_array(1, explode(',', $userlist->equipment)) ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="custom-radio-1" name="equipment1">
                                          <label class="custom-control-label" for="custom-radio-1">第一類</label>
                                      </div>
                                      <div class="custom-control custom-radio">
                                          <input {{ in_array(2, explode(',', $userlist->equipment)) ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="custom-radio-2" name="equipment2">
                                          <label class="custom-control-label" for="custom-radio-2">第二類</label>
                                      </div>
                                      <div class="custom-control custom-radio">
                                          <input {{ in_array(3, explode(',', $userlist->equipment)) ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="custom-radio-3" name="equipment3">
                                          <label class="custom-control-label" for="custom-radio-3">第三類</label>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="custom-control custom-radio">
                                          <input {{ in_array(4, explode(',', $userlist->equipment)) ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="custom-radio-4" name="equipment4">
                                          <label class="custom-control-label" for="custom-radio-4">第四類</label>
                                      </div>
                                      <div class="custom-control custom-radio">
                                          <input {{ in_array(5, explode(',', $userlist->equipment)) ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="custom-radio-5" name="equipment5">
                                          <label class="custom-control-label" for="custom-radio-5">第五類</label>
                                      </div>
                                      <div class="custom-control custom-radio">
                                          <input {{ in_array(6, explode(',', $userlist->equipment)) ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="custom-radio-6" name="equipment6">
                                          <label class="custom-control-label" for="custom-radio-6">第六類</label>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="custom-control custom-radio">
                                          <input {{ in_array(7, explode(',', $userlist->equipment)) ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="custom-radio-7" name="equipment7">
                                          <label class="custom-control-label" for="custom-radio-7">第七類</label>
                                      </div>
                                      <div class="custom-control custom-radio">
                                          <input {{ in_array(8, explode(',', $userlist->equipment)) ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="custom-radio-8" name="equipment8">
                                          <label class="custom-control-label" for="custom-radio-8">特類</label>
                                      </div>
                                  </div>
                                  <span class="help-block">{{ $errors->first('equipment') }}</span>
                              </div>
                              <div class="form-group row @if(!empty($errors->first('building'))) has-error @endif">
                                  <label class="col-sm-2">対応可能<br>建物種別</label>
                                  <div class="col-sm-3">
                                      <select class="form-control form-control-sm" name="building">
                                          <option value="">選択してください</option>
                                          <option {{ explode(',', $userlist->building)[0] == 'マンション' ? 'selected' : '' }}>マンション</option>
                                          <option {{ explode(',', $userlist->building)[0] == 'アパート' ? 'selected' : '' }}>アパート</option>
                                          <option {{ explode(',', $userlist->building)[0] == 'ビル' ? 'selected' : '' }}>ビル</option>
                                          
                                      </select>
                                      <span class="help-block">{{ $errors->first('building') }}</span>
                                  </div>
                                  <div class="col-sm-3">
                                      <select class="form-control form-control-sm" name="building2">
                                          <option value="">選択してください</option>
                                          <option {{ explode(',', $userlist->building)[1] == 'マンション' ? 'selected' : '' }}>マンション</option>
                                          <option {{ explode(',', $userlist->building)[1] == 'アパート' ? 'selected' : '' }}>アパート</option>
                                          <option {{ explode(',', $userlist->building)[1] == 'ビル' ? 'selected' : '' }}>ビル</option>
                                      </select>
                                  </div>
                                  <div class="col-sm-3">
                                      <select class="form-control form-control-sm" name="building3">
                                          <option value="">選択してください</option>
                                          <option {{ explode(',', $userlist->building)[2] == 'マンション' ? 'selected' : '' }}>マンション</option>
                                          <option {{ explode(',', $userlist->building)[2] == 'アパート' ? 'selected' : '' }}>アパート</option>
                                          <option {{ explode(',', $userlist->building)[2] == 'ビル' ? 'selected' : '' }}>ビル</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row @if(!empty($errors->first('introduction'))) has-error @endif">
                                  <label class="col-sm-2">自己紹介欄</label>
                                  <div class="col-sm-10">
                                      <textarea class="form-control" name="introduction" rows="20">{{ old('introduction', $userlist->introduction) }}</textarea>
                                      <span class="help-block">{{ $errors->first('introduction') }}</span>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-sm-2">画像</label>
                                  <div class="col-sm-10">
                                      <input type="file" class="form-control-file" name="image">
                                  </div>
                              </div>
                              　{{ csrf_field() }}
                              <input type="submit" class="btn btn-secondary" value="登録">
                          </form>
                      </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection