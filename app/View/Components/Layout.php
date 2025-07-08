<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Layout extends Component
{
    public $menu;
    public $contact_center;
    public $contacts_list;
    public $social_networks;
    /**
     * Create a new component instance.
     */
    public function __construct(public ?string $metaTitle = null, public ?string $metaDescription = null, public ?string $metaImage = null)
    {
        $this->menu = Cache::remember('menu', now()->addDays(1), function() {
            return Menu::with(['page','children' => function($q){
                $q->with(['page','children' => function($c){
                    $c->with(['page'])->where('active',true)->orderBy('sort');
                }])->where('active',true)->orderBy('sort');
            }, 'parent'])->where(["active"=>true,'parent_id'=>NULL])->orderBy('sort')->get();
        }); 
        $this->contact_center = Cache::remember('contact_center', now()->addDays(1), function() {
            return DB::table('text_widgets')->where('key','contact_center')->where('active', true)->first();
        });
        $this->contacts_list = DB::table('text_widgets')->where('key','contacts_list')->where('active', true)->first();
        $this->social_networks = DB::table('text_widgets')->where('key','social_networks')->where('active', true)->first();
     //dd($this->social_networks);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.app',['menu'=>$this->menu]);
    }
}
