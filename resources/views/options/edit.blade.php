@extends('layouts.gm')
@section('content')
<div class="card">
      <div class="card-hd">
            <h5>站点设置</h5>
      </div>
      <div class="card-bd">
            <form action="{{ route('options.update') }}" method="post" class="x-form">
                  @csrf
                  @method('patch')
                  <div class="field">
                        <label class="x-label">站点名称</label>
                        <div class="field-bd">
                              <input type="text" name="site_name" class="form-item" value="{{ $options['site_name'] }}">
                        </div>
                  </div>
                  <div class="field">
                        <label class="x-label">站点关键词</label>
                        <div class="field-bd">
                              <input type="text" name="site_keywords" class="form-item" value="{{ $options['site_keywords'] }}">
                        </div>
                  </div>
                  <div class="field">
                        <label class="x-label">站点描述</label>
                        <div class="field-bd">
                              <textarea type="text" rows="3" name="site_info" class="form-item">{{ $options['site_info'] }}</textarea>
                        </div>
                  </div>
                  <div class="field">
                        <label class="x-label">版权信息</label>
                        <div class="field-bd">
                              <textarea type="text" rows="3" name="site_copy" class="form-item">{{ $options['site_copy'] }}</textarea>
                        </div>
                  </div>
                  <div class="field">
                        <label class="x-label"></label>
                        <div class="field-bd">
                              <button class="btn btn-primary" type="submit">提 交</button>
                        </div>
                  </div>
            
            </form>
      </div>
</div>
@endsection

@section('script')

@endsection