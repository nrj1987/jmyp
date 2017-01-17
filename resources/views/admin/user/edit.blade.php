@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>用户修改</span>
    </div>
    
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/user/update" method="post">
    	<!-- 为了安全有token -->
    		<!-- 每个input给name值 -->
    		<input type="hidden" name="id" value="{{$vo['id']}}">
    		{{csrf_field()}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">姓名</label>
    				<div class="mws-form-item">
    					<input class="small" type="text" name="name" value="{{$vo['name']}}">
    				</div>
    			</div>
    		</div>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">邮箱</label>
    				<div class="mws-form-item">
    					<input class="small" type="text" name="email" value="{{$vo['email']}}">
    				</div>
    			</div>
    		</div>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">手机号码</label>
    				<div class="mws-form-item">
    					<input class="small" type="text" name="phone" value="{{$vo['phone']}}">
    				</div>
    			</div>
    		</div>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">状态</label>
    				<div class="mws-form-item">
    					<!-- large是全屏的长度 small是跟上面的样式一致 -->
						<select name="status" class="small" id="">
							<option value="0" @if($vo['status']=='0') selected @endif>禁用</option>
							<option value="1" @if($vo['status']=='1') selected @endif>启用</option>
						</select>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			<input value="确认修改" class="btn btn-danger" type="submit">
    			<input value="重置" class="btn " type="reset">
    		</div>
    	</form>
    </div>    	
</div>
@endsection