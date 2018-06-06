<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Intervention\Image\Facades\Image;
use App\Kategori;
use App\Resim;
use Illuminate\Support\Facades\Session;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriler = Kategori::paginate(10);
        return view('admin.kategori_index',compact('kategoriler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ //Kontrol işlemi yapıyoruz
            'baslik' => 'required|max:255',
            'resim' => 'required'
        ]);

        $kategori = Kategori::create($request->all()); //Kategoriler tablosuna kayıt ediyoruz

        if($resim = $request->file('resim'))//Eğer resim varsa yani kategori_create sayfasındaki resim değişkeni mevcut ise
        {
            $time = time();
            $resim_isim = $time.'.'.$resim->getClientOriginalExtension();//Resmin ismini değiştiriyoruz
            $thumb = 'thumb_'.$time.'.'.$resim->getClientOriginalExtension();//Küçük resmin ismini değiştiriyoruz

            Image::make($resim->getRealPath())->fit(930,460)->fill(array(0,0,0,0.5))->save(public_path('uploads/'.$resim_isim));/*İmage kütüphanesi ile resmi boyutlandırıp üzerine transparan renk ekleyerek kayıt yolunu belirtiyoruz*/
            Image::make($resim->getRealPath())->fit(500,250)->save(public_path('uploads/'.$thumb));

            $input = [];//İnput isimli dizi tipinde bir değişken oluşturuyoruz
            $input['isim'] = $resim_isim;
            $input['imageable_id'] = $kategori->id;
            $input['imageable_type'] = 'App\Kategori';

            Resim::create($input);//$input değişkenine ait tüm verileri resim tablosuna ekliyoruz
        }
        Session::flash("durum",1);
        return redirect('kategori');
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
        $kategori = Kategori::find($id);
        return view('admin.kategori_edit',compact('kategori'));
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
        $this->validate($request,[ //Kontrol işlemi yapıyoruz
            'baslik' => 'required|max:255'
        ]);

        $kategori = Kategori::find($id); //Kategoriler tablosunu güncelliyoruz
        $kategori->update($request->all());

        if($resim = $request->file('resim'))//Eğer resim varsa yani kategori_create sayfasındaki resim değişkeni mevcut ise
        {
            $resim_isim = $kategori->resim->isim;
            $thumb = 'thumb_'.$kategori->resim->isim;

            Image::make($resim->getRealPath())->fit(930,460)->fill(array(0,0,0,0.5))->save(public_path('uploads/'.$resim_isim));/*İmage kütüphanesi ile resmi boyutlandırıp üzerine transparan renk ekleyerek kayıt yolunu belirtiyoruz*/
            Image::make($resim->getRealPath())->fit(500,250)->save(public_path('uploads/'.$thumb));
        }
        Session::flash("durum",1);
        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori_resim = Kategori::find($id)->resim->isim;
        @unlink(public_path('uploads/'.$kategori_resim));
        @unlink(public_path('uploads/thumb_'.$kategori_resim));

        Resim::where('imageable_id',$id)->where('imageable_type','App\Kategori')->delete();
        Kategori::destroy($id);
        Session::flash("durum",1);
        return redirect('/kategori');
    }
}
