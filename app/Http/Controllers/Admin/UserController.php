<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);//User tablosundan 10 kullanıcıyı sayfalama yaparak alıyoruz
        return view('admin.user_index',compact('users'));//Aldığımız verileri user_index view'ine gönderiyoruz
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);//User tablosundan id'si, $id değişkenine eşit olan kullanıcıyı alıyoruz
        return view('admin.user_edit',compact('user'));//Aldığımız veriyi user_edit view'ine gönderiyoruz
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[       //Değer kontrol yapıyoruz
            'name' => 'required|max:255',//İsim alanı gerekli ve en fazla 255 karakter alabilir
            'email' => 'required|email|unique:users,email,'.$id, /*Mail alanı gereklidir ve mail alanı benzersiz olmalıdır. id değeri $id değerine eşit olan kullanıcının mail adresi aynı ise güncelleme işlemine dahil etme*/
            'password' => !empty($request->password) ? 'required|min:6' : '' /*Şifre alanı boş değil ise en az 6 karakter girilebilir. Şifre alanı boş geçilirse şifre kontrolü yapmayacak. Güncelleme yaparken şifre kaydedilmeyecek.*/
        ]);

        if(!empty($request->password))//Şifre alanı boş değil ise
        {
            $input = $request->all();//Tüm verileri alıyoruz
            $input['password'] = bcrypt($request->password);//Giden şifreyi bcrypt ile şifreliyoruz

            User::find($id)->update($input);//User tablosundaki id'si $id değerine eşit olan kullanıcıya ait şifreyi yani $input değişkenini güncelle
        }
        else//Şifre alanı boş ise
        {
                User::find($id)->update([//User tablosundaki id'si $id değerine eşit olan kullanıcıyı güncelliyoruz
                'name' => $request->name,
                'email' => $request->email
            ]);
        }

        //role_user tablosundaki update işlemleri
        DB::table('role_user')->where('user_id',$id)->delete();//role_user tablosundan, user_id'si $id değişkenine eşit olan kullanıcıya ait rolleri siliyoruz
        $roller = [];//Gelen verileri bu dizi içine alacağız
        foreach($request->rol as $rol)
        {
            $yeni_rol = ['role_id' => $rol, 'user_id' => $id];//gelen verileri dizi ile dönderiyoruz
            array_push($roller, $yeni_rol);//$roller değişkeninin sonuna $yeni_rol değişkenini ekliyoruz
        }
        DB::table('role_user')->insert($roller);//$roller değişkenindeki verileri role_user tablomuza ekliyoruz
        return redirect('/user');//user routuna yönlendiriyoruz
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        DB::table('role_user')->where('user_id',$id)->delete();
        return redirect()->back();
    }
}
