<?php

namespace App\Http\Controllers\Yazar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Kategori;
use App\Makale;
use App\Resim;
use Illuminate\Support\Facades\Session;

class MakaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makaleler  = Makale::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        return view('yazar.makale_index',compact('makaleler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriler = Kategori::lists('baslik','id')->all();
        return view('yazar.makale_create',compact('kategoriler'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'baslik' => 'required|max:255',
            'resim' => 'required',
            'kategori_id' => 'required',
            'icerik' => 'required'
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['durum'] = 0;

        $makale = Makale::create($input);

        if($resim = $request->file('resim'))//Eğer resim varsa yani kategori_create sayfasındaki resim değişkeni mevcut ise
        {
            $time = time();
            $resim_isim = $time.'.'.$resim->getClientOriginalExtension();//Resmin ismini değiştiriyoruz
            $thumb = 'thumb_'.$time.'.'.$resim->getClientOriginalExtension();//Küçük resmin ismini değiştiriyoruz

            Image::make($resim->getRealPath())->fit(930,460)->fill(array(0,0,0,0.5))->save(public_path('uploads/'.$resim_isim));/*İmage kütüphanesi ile resmi boyutlandırıp üzerine transparan renk ekleyerek kayıt yolunu belirtiyoruz*/
            Image::make($resim->getRealPath())->fit(500,250)->save(public_path('uploads/'.$thumb));

            $input = [];//İnput isimli dizi tipinde bir değişken oluşturuyoruz
            $input['isim'] = $resim_isim;
            $input['imageable_id'] = $makale->id;
            $input['imageable_type'] = 'App\Makale';

            Resim::create($input);//$input değişkenine ait tüm verileri resim tablosuna ekliyoruz
        }
        Session::flash("durum",2);
        return redirect('makalem');
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
        $makale = Makale::find($id);
        $kategoriler = Kategori::lists('baslik','id')->all();
        return view('yazar.makale_edit',compact('makale','kategoriler'));
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
        $this->validate($request,[
            'baslik' => 'required|max:255',
            'kategori_id' => 'required',
            'icerik' => 'required'
        ]);

        $input = $request->all();
        $input['durum'] = 0;
        $makale = Makale::find($id);
        $makale->update($input);

        if($resim = $request->file('resim'))//Eğer resim varsa yani kategori_create sayfasındaki resim değişkeni mevcut ise
        {
            $resim_isim = $makale->resim->isim;
            $thumb = 'thumb_'.$makale->resim->isim;

            Image::make($resim->getRealPath())->fit(930,460)->fill(array(0,0,0,0.5))->save(public_path('uploads/'.$resim_isim));/*İmage kütüphanesi ile resmi boyutlandırıp üzerine transparan renk ekleyerek kayıt yolunu belirtiyoruz*/
            Image::make($resim->getRealPath())->fit(500,250)->save(public_path('uploads/'.$thumb));
        }
        Session::flash("durum",2);
        return redirect('makalem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $makale_resim = Makale::find($id)->resim->isim;
        @unlink(public_path('uploads/'.$makale_resim));
        @unlink(public_path('uploads/thumb_'.$makale_resim));

        Resim::where('imageable_id',$id)->where('imageable_type','App\Makale')->delete();
        Makale::destroy($id);

        Session::flash("durum",1);
        return redirect('/makalem');
    }

    public function durumDegis(Request $request)
    {
        $id = $request->id;
        $durum = ($request->durum == 'true') ? 1 : 0;

        Makale::find($id)->update(['durum' => $durum]);
    }
}
