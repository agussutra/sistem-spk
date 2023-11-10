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
                        <td class="border">{{ $index + 1 }}</td>
                    @elseif (is_callable($field))
                        <td class="border text-center">{{ $field($item) }}</td>
                    @elseif ($field === 'status')
                    <td class="border text-center">
                        @if ($item[$field] === 0)
                            <p class="bg-red-500 rounded-md text-white text-sm py-2 font-medium">Pending</p>
                        @else
                        <p class="bg-green-500 rounded-md text-white text-sm py-2">Approve</p>
                        @endif
                    </td>
                    @else
                        <td class="border text-center">{{ $item[$field] }}</td>
                    @endif
                @endforeach

                @if ($aksi == true)
                    <td class="border text-center w-[200px]">
                        @if ($actionUpdate == true)
                            <button class="btn-update" id="updateData" data-target="#modalEdit"
                                onclick="editData({{ json_encode($item) }})">Edit
                            </button>
                        @endif
                        @if ($actionDelete == true)
                            <button class="btn-delete" id="deleteData" data-target="#modalDelete"
                                onclick="hapusData({{ json_encode($item) }})">Delete</button>
                        @endif

                        @if ($actionShow == true)
                            <button class="btn-show" id="showData" data-target="#modalDelete"
                                onclick="showData({{ json_encode($item) }})">Detail</button>
                        @endif

                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

<script></script>
