@extends('layouts.gm')
@section('title','用户列表')

@section('content')
<div class="card">
    <div class="card-hd px-1 px-md-4 pb-0">
        <div class="card-tools flex-y-center">
            <h5>用户列表</h5>
            <select class="form-item form-item-sm ml-auto w-auto mr-1" name="">
                <option>全部</option>
                <option>已激活</option>
                <option>未激活</option>
            </select>
            <div class="is-group">
                
                <input class="form-item form-item-sm" type="search" name="search" id="">
                <button class="btn btn-primary btn-sm">搜索</button>
            </div>
        </div>
    </div>
    <div class="card-bd px-1 px-md-4">
        <table class="table table-hover table-data table-responsive-md" id="usertable">
            <thead>
                <tr>
                    <th>用户</th>
                    <th>邮箱</th>
                    <th>注册时间</th>
                    <th class="text-center">权限</th>
                    <th class="text-center">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        <div class="flex-y-center">
                            <div class="mr-2 position-relative">
                                {{-- <span class="dot free-tl"></span> --}}
                                <img class="avatar o mbg-info" src="{{ $user->avatars() }}" alt="{{ $user->id }}">
                            </div>
                            <a class="link-dark" href="{{ route('user.show',$user) }}" target="_blank">{{ $user->name }}</a>
                            
                        </div>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="text-center">
                        @if ($user->is_admin)
                            <span class="badge badge-danger oo">管理员</span>
                            @else  
                            <span class="badge badge-secondary oo">会员</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a class="btn-space" href="{{ route('user.edit',$user->id) }}" target="_blank">
                            <i class="icon icon-edit-m"></i>
                        </a>
                        @can('unself',$user)
                        <button class="btn-space" type="button" v-on:click="del({{ $user->id }})">
                            <i class="icon icon-delete-m"></i>
                        </button>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if ($users->count()>0)
        <div class="paginate d-flex justify-content-end bo-top">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>

@endsection

@section('script')
<script>
let app = new Vue({
    el:'#app',
    methods:{
        del(uid){
            axios.delete('{{ url('user') }}/'+uid).then(res=>{
               window.location.reload(true);
            });
        }
    }
})
</script>
@endsection