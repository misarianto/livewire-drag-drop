<?php

namespace App\Http\Livewire;

use App\Models\Menu as ModelsMenu;
use App\Models\SubMenu;
use Livewire\Component;

class Menu extends Component
{
    public $newMenuLabel, $position;


    public function render()
    {
        $menus = ModelsMenu::get();
        return view('livewire.menu', [
            'menus' => $menus
        ]);
    }

    public function addSubmenu($id, $submenu)
    {
        SubMenu::create([
            'menu_id' => $id,
            'submenu' => $submenu
        ]);
    }

    public function addMenu()
    {
        ModelsMenu::create([
            'menu' => $this->newMenuLabel
        ]);

        $this->newMenuLabel = '';
    }

    public function removeMenu($id)
    {
        ModelsMenu::find($id)->delete();
    }
    
    public function removeSubmenu($id)
    {
        SubMenu::find($id)->delete();
    }
}
