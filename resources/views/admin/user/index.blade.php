@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8 mws-collapsible">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>用户浏览</span>
    	<div class="mws-collapse-button mws-inset">
    		<span></span>
    	</div>
    </div>
    <div class="mws-panel-inner-wrap">
    	<div class="mws-panel-body no-padding">
	        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
	        <form action="/admin/user/index" method="get">
		        <div id="DataTables_Table_0_length" class="dataTables_length">
		        	<label>显示 
		        		<select size="1" name="num" aria-controls="DataTables_Table_0">
		        			<option value="5"
								@if(!empty($request['num']) && $request['num']=='5')
									selected
								@endif
		        			>5</option>
		        			<option value="10"
								@if(!empty($request['num']) && $request['num']=='10')
									selected
								@endif
		        			>10</option>
		        			<option value="25"
								@if(!empty($request['num']) && $request['num']=='25')
									selected
								@endif
		        			>25</option>
		        			<option value="50"
								@if(!empty($request['num']) && $request['num']=='50')
									selected
								@endif
		        			>50</option>
		        			<option value="100"
								@if(!empty($request['num']) && $request['num']=='100')
									selected
								@endif
		        			>100</option>
		        		</select> 条
		        	</label>
		        </div>
		        <div class="dataTables_filter" id="DataTables_Table_0_filter">
		        	<label>搜索: 
		        		<input name="keyword" value="@if(!empty($request['keyword'])){{$request['keyword']}}@endif" aria-controls="DataTables_Table_0" type="text">
		        	</label>
		        	<input type="submit" class="btn btn-primary" value="搜索">
		        </div>
	        </form>
	        <table class="mws-table mws-datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
	            <thead>
	                <tr role="row">
	                	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 139px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;" aria-label="Browser: activate to sort column ascending">姓名</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 117px;" aria-label="Engine version: activate to sort column ascending">邮箱</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 84px;" aria-label="CSS grade: activate to sort column ascending">手机号</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 171px;" aria-label="Platform(s): activate to sort column ascending">状态</th>
	                	<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 137px;" aria-label="">操作</th>
	                </tr>
	            </thead>
	            <tbody role="alert" aria-live="polite" aria-relevant="all">
	        	@foreach($list as $k=>$v)
	        		@if($k%2==0)
	        		<tr class="odd">
	        		@else
	        		<tr class="even">

	        		@endif
	                    <td class="  sorting_1">{{$v['id']}}</td>
	                    <td class=" ">{{$v['name']}}</td>
	                    <td class=" ">{{$v['email']}}</td>
	                    <td class=" ">{{$v['phone']}}</td>
	                    <td class=" ">
	                    	@if($v['status']==0)
	                    		禁用
	                    	@else
	                    		启用
	                    	@endif

	                    </td>
	                    <!-- <td class=" "><span class="badge badge-info">A</span></td> -->
	                    <td class=" ">
	                        <span class="btn-group">
	                            <a href="#" class="btn btn-small"><i class="icon-search"></i></a>
	                            <a href="/admin/user/edit/{{$v['id']}}" class="btn btn-small"><i class="icon-pencil"></i></a>
	                            <a href="/admin/user/del/{{$v['id']}}" class="btn btn-small"><i class="icon-trash"></i></a>
	                        </span>
	                    </td>
	            	</tr>
	            @endforeach
	        	</tbody>
	        </table>
	        
	        <div class="dataTables_paginate paging_two_button" id="page">
	        	{!!$list->appends($request)->render()!!}
	        </div>
	        </div>
    	</div>
    </div>
</div>
@endsection