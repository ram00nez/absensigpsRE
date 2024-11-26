<form action="/karyawan/{{ $karyawan->nik ?? 'null' }}/update" method="POST" id="frmKaryawan" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  
                  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
                  class="icon icon-tabler icons-tabler-outline icon-tabler-barcode"><path stroke="none" d="M0 0h24v24H0z" 
                  fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" />
                  <path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" />
                  <path d="M19 11l0 2" /></svg>
                </span>
                <input type="text" readonly value="{{$karyawan->nik ?? ''}}" id="nik" class="form-control" name="nik" placeholder="Nik">
              </div>
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                </span>
                <input type="text" value="{{ $karyawan->nama_lengkap ?? ''}}" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required >
              </div>
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mail"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
                </span>
                <input type="text" value="{{ $karyawan->email ?? ''}}" id="email" class="form-control" name="email" placeholder="Email" required >
              </div>
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-briefcase"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" /><path d="M12 12l0 .01" /><path d="M3 13a20 20 0 0 0 18 0" /></svg>
                </span>
                <input type="text" value="{{ $karyawan->jabatan ?? ''}}" id="jabatan" class="form-control" name="jabatan" placeholder="jabatan" required >
              </div>
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-device-mobile"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z" /><path d="M11 4h2" /><path d="M12 17v.01" /></svg>
                </span>
                <input type="text" value="{{ $karyawan->no_hp ?? ''}}" id="no_hp" class="form-control" name="no_hp" placeholder="No Handphone" required >
              </div>
              <div class="row">
                <div class="col-12">
                    <select name="kode_dept" id="kode_dept" class="form-select" required >
                        <option value="">Departement</option>
                        @foreach($departemen as $d)
                            <option {{ Request('kode_dept')==$d->kode_dept ? 'selected' : '' }} value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option>    
                        @endforeach
                      </select>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-12">
                    <div class="form-label">Foto</div>
                    <input type="file" id="foto" class="form-control" placeholder="Foto" name="foto">
                    <input type="hidden" id="old_foto" value="{{ $karyawan->foto ?? 'Null'}}">
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" value="" autocomplete="off">
                        <label for="floating-password">Password</label>
                      </div>
                </div>
              </div>

        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group">
                <button class="btn btn-primary w-100"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-send"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                    Simpan
                </button>
            </div>
        </div>
    </div>
  </form>