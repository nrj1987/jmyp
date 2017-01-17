@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8 mws-collapsible">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>分类列表浏览</span>
    	<div class="mws-collapse-button mws-inset">
    		<span></span>
    	</div>
    </div>
    <div class="mws-panel-inner-wrap">
    	<div class="mws-panel-body no-padding">
	        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">

	        <table class="mws-table mws-datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
	            <thead>
	                <tr role="row">
	                	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 139px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;" aria-label="Browser: activate to sort column ascending">分类名称</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 117px;" aria-label="Engine version: activate to sort column ascending">PID</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 84px;" aria-label="CSS grade: activate to sort column ascending">PATH</th>
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
	                    <td class=" ">{{$v['cate']}}</td>
	                    <td class=" ">{{\App\Http\Controllers\CateController::funame($v['pid'])}}</td>
	                    <td class=" ">{{$v['path']}}</td>

	                    <!-- <td class=" "><span class="badge badge-info">A</span></td> -->
	                    <td class=" ">
	                        <span class="btn-group">
	                            <a href="/admin/cate/add/{{$v['id']}}" class="btn btn-small"><i class="icon-plus"></i></a>
	                            <a href="/admin/cate/edit/{{$v['id']}}" class="btn btn-small"><i class="icon-pencil"></i></a>
	                            <a href="/admin/cate/del/{{$v['id']}}" class="btn btn-small"><i class="icon-trash"></i></a>
	                        </span>
	                    </td>
	            	</tr>
	            @endforeach
	        	</tbody>
	        </table>
	      
	        </div>
    	</div>
    </div>
</div>
@endsection