<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Menu extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title_kk',
        'title_ru',
        'title_en',
        'slug',
        'link',
        'is_external_link',
        'sort',
        'parent_id',
        'active',
        'banner',
        'is_request_page',
    ];
    public function parent()
    {
        return $this->hasOne(Menu::class,'id','parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class,'parent_id','id');
    }

    public function page()
    {
        return $this->hasOne(Page::class);
    }

    public function getUrl()
    {
        if ($this->is_external_link) {
            return $this->{'link_' . app()->getLocale()};
        } elseif ($this->link) {
            return route($this->link, ['locale' => app()->getLocale()]);
        } elseif ($this->is_request_page && $this->page) {
            return route('request', ['locale' => app()->getLocale(), 'page' => $this->page]);
        } else {
            return route('page', ['locale' => app()->getLocale(), 'page' => $this->page]);
        }
    }

    public function getBanner(){
        if($this->banner){
           return '/storage/'. $this->banner;
        }
        return '/img/semei.jpg';
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            Cache::forget('menu');
        });

        static::updated(function () {
            Cache::forget('menu');
        });

        static::deleted(function () {
            Cache::forget('menu');
        });
    }
}
