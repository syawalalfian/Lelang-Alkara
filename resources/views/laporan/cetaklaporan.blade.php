<table>
    <thead class="">
                      <tr>
                        <th>No</th>
                        <th>Penawar</th>
                        <th>Nama Barang</th>
                        <th>Harga Penawaran</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($cetakhistory as $item)
                         <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{Str::title($item->user->name)}}</td>
                            <td>{{ $item->lelang->barang->nama_barang }}</td>
                            <td>@currency($item->harga)</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('j-F-Y') }}</td>
                             <td><span class="badge text-white {{ $item->status == 'pending' ? 'bg-warning' : ($item->status == 'gugur' ? 'bg-danger' : 'bg-success') }}">{{ Str::title($item->status) }}</span></td>
                        </tr>   
                        @empty

                        @endforelse
                    </tbody>
</table>