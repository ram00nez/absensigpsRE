@if ($history->isEmpty())
    <div class="alert alert-outline-warning">
        <p style="text-align:center">Data Belum Ada</p>
    </div>
    
@endif
@foreach ($history as $d)
<ul class="listview image-listview">
    <li>
        <div class="item">
            @php
                $path = Storage::url('uploads/absensi/'.$d->foto_in);
            @endphp
            <img src="{{ url($path) }}" alt="image" class="image">
            <div class="in">
                <div>
                    <b>{{ date("d-m-Y",strtotime($d->tgl_absen)) }}</b><br>
                    {{-- <small class="text-muted">{{ $d ->jabatan }}</small> --}}
                </div>
                <span class="badge {{ $d->jam_in < "07:00" ? "bg-success" : "bg-danger"}}">
                    {{ $d->jam_in }}
                </span>
                <span class="badge bg-primary">{{ $d->jam_out }}</span>
            </div>
        </div>
    </li>
</ul>
@endforeach