<label>
    <select wire:model="perPage" aria-controls="DataTables_Table_4" class="form-select">
        @foreach($numbers as $key => $number)
        <option value="{{ $key }}">{{ $number }}</option>
        @endforeach
    </select>
</label>
