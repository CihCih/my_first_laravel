<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {   $users = User::get();

        $header = '新增管理者';
        $slot = '';

        return view('account.index',compact('users','header','slot'));
    }

    public function create()
    {
        $header = '新增管理者-新增頁';
        $slot = '';
        return view('account.create',compact('header','slot'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        // Laravel內建帳號註冊的防呆，檢查輸入是否錯誤
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return redirect('/account/create')->with('problem','輸入資訊錯誤請重新檢查');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> Hash::make($request->password),
            'power'=> 1,
        ]);

        return redirect('/account')->with('success','新增成功');
    }


    public function edit($id)
    {
        $users = User::find($id);
        // dd($users);
        $header = '新增管理者-編輯頁';
        $slot = '';

        return view('/account.edit',compact('users','header','slot'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->power = $request->power;

        // dd(Hash::needsRehash($request->password));
        // 實際檢測發現，有改密碼會是true，沒改密碼會是false，所以將改密碼的功能放在if true要執行的地方

        // needsRehash檢查是否已經做過Hash運算了，如果沒有才會執行裡面的程式
        if (Hash::needsRehash($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('/account')->with('success','編輯成功');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect('/account')->with('success','刪除成功');
    }
}
