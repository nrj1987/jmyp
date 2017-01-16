<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getAdd(){
        return view('admin.user.add');
    }

    // 执行添加 
    public function postInsert(Request $request){
        // $res=$request->all();不是要全部的数据 排除
        
        // dd($res);
        // if(!$request->input('name')){
        // 	return back()->withInput();
        // }
        // 1.验证表单数据 第一个数组设置规则 第二个数组设置报错信息
        $this->validate($request,[
        	'name'=>'required',
        	'username'=>'required',
        	'repass'=>'same:password|required',
        	'email'=>'required|email'

        ],[
        	'name.required'=>'姓名必须填写',
        	'username.required'=>'用户名必须填写',
        	'repass.same'=>'两次密码必须一致',
        	'repass.required'=>'重复密码必须填写',
        	'email.required'=>'邮箱必须填写',
        	'email.email'=>'邮箱格式不正确'
        ]);
        // 2.数据处理
        $data=$request->except(['_token','repass']);
        $data['password']=Hash::make($data['password']);
        $data['token']=str_random(50);
        $data['status']=0;
        // 3.数据插入
        $res=DB::table('user')->insert($data);
        if($res){
        	echo '用户浏览页';
        	// return redirect('/admin/user/index');
        }else{
        	return back();
        }

    }

    public function getIndex(){
    	$data=DB::table('user')->get();
    	// dd($data);
    	return view('admin.user.index',['list'=>$data]);
    }

    public function getEdit(){
    	echo '修改页面';
    }

    public function getDel(){
    	echo '删除页面';
    }
}
