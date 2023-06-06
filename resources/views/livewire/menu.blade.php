<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="addMenu" class="row g-2">
                        <div class="col-auto">
                            <input type="text" wire:model="newMenuLabel" class="form-control">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary">Add Menu</button>
                            <a href="{{ url('shortable') }}" class="btn btn-info">Shortable</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div wire:sortable="updateMenuOrder" wire:sortable-menu="updateSubmenuOrder" style="display: flex">
        <div class="row mt-5 d-flex justify-content-center">

            @foreach ($menus as $menu)
            <div class="col-6">

                <div wire:key="menu-{{ $menu->id }}" wire:sortable.item="{{ $menu->id }}">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-start">
                                <h4 wire:sortable.handle>{{ $menu->menu }}</h4>
                            </div>
                            <div class="float-end">
                                <button wire:click="removeMenu({{ $menu->id }})"
                                    class="btn btn-danger btn-sm">Remove</button>
                            </div>
                        </div>
                        <div class="card-body">


                            <ul class="list-group" wire:sortable-menu.item-menu="{{ $menu->id }}">
                                @foreach ($menu->submenus()->orderBy('position')->get() as $submenu)
                                <li wire:key="submenu-{{ $submenu->id }}" wire:sortable-menu.item="{{ $submenu->id }}"
                                    class="list-group-item">
                                    <div class="float-start">
                                        {{ $submenu->submenu }}
                                    </div>
                                    <div class="float-end">
                                        <button class="btn btn-danger btn-sm"
                                            wire:click="removeSubmenu({{ $submenu->id }})">Remove</button>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                            <form class="mt-3 row g-2"
                                wire:submit.prevent="addSubmenu({{ $menu->id }}, $event.target.title.value)">
                                <div class="col-auto">
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary">Add Submenu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>

    </div>
</div>