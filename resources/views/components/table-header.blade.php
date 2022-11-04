<thead>
    <tr>
        @foreach ($columns as $key => $c)
        @if ($key!='')
        <th class="p-2" wire:click="sortByColumn('{{$key}}')" style="cursor: pointer;">
            {{$c}}
            @if ($sortColumn==$key)
            @if ($sortDirection=='asc')
                &uarr;
            @else
                &darr;
            @endif
            @endif
        </th>
        @else
        <th class="p-2">{{$key}}</th>
        @endif
        @endforeach
        @if ($actions==true)
        <th class="p-2">Acciones</th>
        @endif
    </tr>
</thead>
