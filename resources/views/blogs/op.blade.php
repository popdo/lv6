@extends('layouts.person')
@section('title','文章列表')

@section('content')
<div class="card">
    <div class="card-hd px-1 px-md-4 pb-0">
        <div class="card-tools flex-y-center">
            <h5>文章列表</h5>
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
                    <th>#</th>
                    <th>标题</th>
                    <th>发布时间</th>
                    <th>评论</th>
                    <th class="text-center">状态</th>
                    <th class="text-center">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->created_at->diffForHumans() }}</td>
                    <td>{{ $blog->comment_count }}</td>
                    <td class="text-center">
                        @if ($blog->status==1)
                            <span class="badge badge-danger oo">未审核</span>
                            @else  
                            <span class="badge badge-secondary oo">已发布</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a class="btn-space" href="{{ route('blogs.edit',$blog->id) }}" target="_blank">
                            <i class="icon icon-edit-m"></i>
                        </a>
                        {{-- @can('unself',$user) --}}
                        <button class="btn-space" type="button" v-on:click="del({{ $blog->id }})">
                            <i class="icon icon-delete-m"></i>
                        </button>
                        {{-- @endcan --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if ($blogs->count()>0)
        <div class="paginate d-flex justify-content-end bo-top">
            {{ $blogs->links() }}
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
            axios.delete('{{ url('blogs') }}/'+uid).then(res=>{
               window.location.reload(true);
            });
        }
    }
})
</script>
@endsection