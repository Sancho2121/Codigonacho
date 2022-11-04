<div>
    <label for="role">Rol</label>
    <div wire:ignore>
        <select data-pharaonic="select2" data-component-id="{{ $this->id }}" wire:model="role">
            @foreach ($roles as $key => $name)
            <option value="{{$key}}">{{$name}}</option>
            @endforeach
        </select>
    </div>
</div>
