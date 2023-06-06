{{-- <div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-6" wire:sortable="updateMenuOrder" wire:sortable-menu="updateSubmenuOrder">
            <ul class="list-group">
                @foreach ($menus as $menu)
                <li role="button" wire:key="menu-{{ $menu->id }}" wire:sortable.item="{{ $menu->id }}" class="list-group-item">
                    <h4 wire:sortable.handle>{{ $menu->menu }}</h4>
                </li>

                <ul class="list-group" wire:sortable-menu.item-menu="{{ $menu->id }}">
                    @foreach ($menu->submenus()->orderBy('position')->get() as $submenu)
                    <li role="button" wire:key="submenu-{{ $submenu->id }}" wire:sortable-menu.item="{{ $submenu->id }}" class="list-group-item">
                        <p wire:sortable.handle>
                            {{ $submenu->submenu }}
                        </p>
                    </li>
                    @endforeach
                </ul>
                @endforeach
            </ul>
        </div>
    </div>
</div> --}}



{{-- <div wire:sortable="updateMenuOrder" wire:sortable-group="updateSubmenuOrder" style="display: flex">
    @foreach ($menus as $group)
        <div wire:key="group-{{ $group->id }}" wire:sortable.item="{{ $group->id }}">
            <div style="display: flex">
                <h4 wire:sortable.handle>{{ $group->menu }}</h4>
            </div>

            <ul wire:sortable-group.item-group="{{ $group->id }}">
                @foreach ($group->submenus()->orderBy('position')->get() as $task)
                    <li wire:key="task-{{ $task->id }}" wire:sortable-group.item="{{ $task->id }}">
                        {{ $task->submenu }}
                    </li>
                @endforeach
            </ul>

        </div>
    @endforeach
</div> --}}

<div class="container mt-5 d-flex justify-content-center">

    <div wire:ignore class="accordion" id="accordionExample" wire:sortable="updateMenuOrder" wire:sortable-group="updateSubmenuOrder">
        @foreach ($menus as $group)
        <div class="accordion-item" wire:key="group-{{ $group->id }}" wire:sortable.item="{{ $group->id }}">
          <h2 class="accordion-header">
            <button wire:sortable.handle class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $group->id }}" aria-expanded="true" aria-controls="collapse-{{ $group->id }}">
                <span class="px-3">
                    {{ $group->menu }}
                </span>
            </button>
          </h2>
          <div id="collapse-{{ $group->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush" wire:sortable-group.item-group="{{ $group->id }}">
                        @foreach ($group->submenus()->orderBy('position')->get() as $task)
                        <li class="list-group-item" wire:key="task-{{ $task->id }}" wire:sortable-group.item="{{ $task->id }}">
                            {{ $task->submenu }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

<div>

