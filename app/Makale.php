<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
	
class Makale extends Model
{
	use Sluggable;

    protected $table = 'makaleler';
    protected $fillable = ['baslik','slug','icerik','user_id','kategori_id','durum'];
    protected $appends = ['kucuk_resim'];

    public function user()
    {
    	return $this->belongsTo('App\User');//Makale ile User modeli arasında ilişki kurduk. Makale hangi kullanıcıya ait
    }

    public function kategori()
    {
    	return $this->belongsTo('App\Kategori');//Makale ile Kategori modeli arasında ilişki kurduk. Makale hangi kategoriye ait
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'baslik'
            ]
        ];
    }

    public function resim()
    {
    	return $this->morphOne('App\Resim','imageable');//Makale ile Reisim modeli arasında polimorfik ilişki kurduk.
    }

    public function getKucukResimAttribute()
    {
    	$resim = asset('uploads/thumb_'.$this->resim()->first()->isim);
    	return '<img src="'.$resim.'" class="img-thumbnail" width="150"/>';
    }
}
