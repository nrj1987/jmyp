<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    //添加分类
    public function getAdd($id=''){//默认值是为了直接点击的时候不报错
    	// echo '分类的添加';
    	// $data=DB::table('cate')->get();
    	$data=self::getCates();
    	// dd($data);
    	return view('admin.cate.add',['list'=>$data,'id'=>$id]);
    }

    // 封装函数实现分类的展示 格式化分类列表
    public static function getCates(){
    	$res=DB::table('cate')->select(DB::raw('*,concat(path,id) as paths'))->orderBy('paths')->get();
    	// dd($res);
    	foreach($res as $k=>$v){
    		$num=count(explode(',',$v['path']))-2;
    		$res[$k]['cate']=str_repeat('|---',$num).$v['cate'];
    	}
    	return $res;
    }

    // 执行插入
    public function postInsert(Request $request){
    	// echo '执行插入';
    	// dd($request->all());
    	if($request->input('id')==0){
    		// 添加顶级分类
    		$data['cate']=$request->input('cate');
    		$data['pid']=0;
    		$data['path']='0,';
    	}else{
    		// 添加某一个类下面的子类
    		$data['cate']=$request->input('cate');
    		$data['pid']=$request->input('id');
    		$path=DB::table('cate')->where('id',$request->input('id'))->first()['path'];
    		$data['path']=$path.$request->input('id').',';
    	}
    	// dd($data);
    	$res=DB::table('cate')->insert($data);
    	// dd($res);
    	if($res){
    		return redirect('/admin/cate/index')->with('success','添加成功');
    	}else{
    		return back()->with('error','添加失败');
    	}


    }

    public function getIndex(){
    	// echo '分类显示';
    	// $data=DB::table('cate')->get();
    	return view('admin.cate.index',['list'=>self::getCates()]);
    }

    // 封装方法实现pid所属父类的显示
    public static function funame($pid){
    	$funame=DB::table('cate')->where('id',$pid)->first()['cate'];
    	echo empty($funame)?'顶级分类':$funame;
    }

    public function getDel($id){
    	$data=DB::table('cate')->where('pid',$id)->get();
    	if(count($data)>0){
    		return back()->with('error','不能删除带有子类的父类');
    	}else{
    		$res=DB::table('cate')->where('id',$id)->delete();
    		if($res){
    			return redirect('/admin/cate/index')->with('success','删除成功');
    		}else{
    			return back()->with('error','删除失败');
    		}
    	}
    }

    public function getEdit($id){
    	$data=DB::table('cate as c1')
    				->join('cate as c2','c1.pid','=','c2.id')
    				->select('c2.cate as funame')
    				->where('c1.id',$id)
    				->first()['funame'];
    	$funame=empty($data)?'顶级分类':$data;
    	return view('admin.cate.edit',[
    		'vo'=>DB::table('cate')->where('id',$id)->first(),
    		// select c1.*,c2.cate as funame from cate as c1,cate as c2 where c1.pid=c2.id and c1.id=10
    		'funame'=>$funame
    		]);
    }
}
