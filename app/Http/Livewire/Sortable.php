<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use App\Models\SubMenu;
use Livewire\Component;

class Sortable extends Component
{
    public function render()
    {
        $menus = Menu::orderBy('position', 'asc')->get();
        return view('livewire.sortable', [
            'menus' => $menus
        ]);
    }

    public function updateMenuOrder($datas)
    {
        foreach($datas as $item){
            Menu::find($item['value'])->update(['position' => $item['order']]);
        }
    }

    public function updateSubmenuOrder($datas)
    {
        foreach($datas as $item){
            SubMenu::find($item['value'])->update(['position' => $item['order']]);
        }
    }
}
