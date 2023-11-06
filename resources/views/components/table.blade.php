<table class="h-full w-full" id="table">
    <thead>
        <tr>
            @foreach ($headers as $header)
                <th class="border">{{ $header }}</th>
            @endforeach
            @if ($aksi == true)
            <th class="border">Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $index => $item)
            <tr>
                @foreach ($mapping as $field)
                    @if ($field === '__INCREMENT__')
                        <td class="border">{{ ++$index }}</td>
                    @elseif (is_callable($field))
                        <td class="border">{{ $field($item) }}</td>
                    @else
                        <td class="border">{{ $item[$field] }}</td>
                    @endif
                @endforeach

                @if ($aksi == true)
                <td class="border text-center w-[200px]">
                    @if ($actionUpdate == true)
                        <button class="btn-update openModal" data-action="edit"
                            @foreach ($data as $index)
                            @foreach ($index as $key => $value) 
                            data-{{ $key }} = "{{ $value }}" @endforeach
                            @endforeach
                            >Edit
                        </button>
                    @endif
                    @if ($actionDelete == true)
                        <button class="btn-delete openModal" id="deleteData" data-action="delete"
                            @foreach ($data as $index)
                            @foreach ($index as $key => $value) 
                            data-{{ $key }} = "{{ $value }}" @endforeach
                            @endforeach
                            >Delete</button>
                    @endif

                </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

<script></script>
