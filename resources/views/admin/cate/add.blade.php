@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>添加分类</span>
    </div>
    
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/cate/insert" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">父分类</label>
                    <div class="mws-form-item">
                        <!-- large是全屏的长度 small是跟上面的样式一致 -->
                        <select name="id" class="small" id="">
                            <option value="0">顶级分类</option>
                        @foreach($list as $v)
                            <option value="{{$v['id']}}"
                            @if($id==$v['id'])
                                selected
                            @endif
                            >{{$v['cate']}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">子分类</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="cate">
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input value="添加分类" class="btn btn-danger" type="submit">
                <input value="重置" class="btn " type="reset">
            </div>
        </form>
    </div>      
</div>
@endsection