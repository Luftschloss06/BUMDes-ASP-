@extends('layouts.guest')
@section('title', 'Masuk | Desa Tirta App')
@section('content')
<div class="auth-wrap">
 <div class="auth-card">
  <section class="auth-left">
    <div>
      <div class="brand">
        <div class="brand-logo" aria-hidden="true">💧</div>
        <div>
          <div class="brand-name">TIRTA MAKMUR <span class="badge-pill">Resmi</span></div>
          <div class="brand-sub">BUMDes Desa Tirta Mandiri</div>
        </div>
      </div>
      <div class="chip"><i></i>Portal Akuntabilitas Desa Terpadu</div>
      <h2>Transparansi Usaha &amp;<br>Kesejahteraan Warga Desa.</h2>
      <p>Digitalisasi operasional Badan Usaha Milik Desa yang adaptif, aman, dan selaras penuh dengan tata kelola Kemendesa PDTT.</p>
      <div class="note">
        <b>Audit Trail Multi-Entitas</b>
        <p>Pencatatan real-time memvalidasi pembukuan kas, inventaris aset lumbung, dan dividen desa tanpa celah manipulasi ledger.</p>
      </div>
    </div>
    <div class="auth-meta"><span>Sistem v3.4.2 Production</span><span>Node Terisolasi Aman</span></div>
  </section>

  <section class="auth-right">
    <form method="POST" action="{{ route('login.store') }}">
      @csrf
      <div class="eyebrow"><strong>Autentikasi Akun</strong><span>T.A. {{ date('Y') }} Semester I</span></div>
      <h1>Selamat Datang</h1>
      <p class="lead">Pilih tingkatan wewenang dan masukkan kredensial untuk sinkronisasi konsensus desa.</p>

      <label class="lbl" id="role-label">Wewenang Akses Terverifikasi</label>
      <div class="roles" role="radiogroup" aria-labelledby="role-label">
        @foreach ($roles as $key => $r)
          <input type="radio" name="role" id="role-{{ $key }}" value="{{ $key }}"
                 data-goal="{{ $r['goal'] }}" data-desc="{{ $r['desc'] }}"
                 @checked(old('role', 'pengelola') === $key)>
          <label for="role-{{ $key }}">{{ $r['label'] }}</label>
        @endforeach
      </div>
      <div class="route-pill" aria-live="polite">
        <span>Tujuan Sesi: <b id="goal"></b></span><small id="desc"></small>
      </div>

      <label class="lbl" for="username">NIK Penduduk atau Nama Akun Terdaftar</label>
      <div class="field">
        <input type="text" id="username" name="username" value="{{ old('username') }}"
               placeholder="Contoh: 3507142008920001 atau adm_desa" autocomplete="username" required>
        @error('username')<div class="err">{{ $message }}</div>@enderror
      </div>

      <div class="field-head"><label class="lbl" for="password" style="margin:0 0 6px">Kata Sandi Portal</label><a href="#">Lupa kata sandi?</a></div>
      <div class="field">
        <input type="password" id="password" name="password" placeholder="Masukkan kata sandi tersertifikasi" autocomplete="current-password" required>
      </div>

      <label class="remember"><input type="checkbox" name="remember" value="1"> Ingat otentikasi di perangkat ini selama 30 hari</label>
      <button type="submit" class="btn-primary">Masuk ke Sistem Desa →</button>

      <div class="assure">🔒 <span><b>Proteksi Terpusat:</b> Setiap riwayat login dienkripsi dan dipetakan ke log IP kantor desa untuk menjaga integritas keuangan publik.</span></div>
    </form>
    <div class="foot">
      <span>© {{ date('Y') }} Desa Tirta • BUMDes Digital Berdaya</span>
      <span><span class="tag">Kemendesa PDTT Ready</span> <span class="tag">SSL 256-Bit</span></span>
    </div>
  </section>
 </div>
</div>
<script>
  // Alur prototipe: memilih wewenang memperbarui "Tujuan Sesi"
  const goal = document.getElementById('goal'), desc = document.getElementById('desc');
  function sync(){ const c = document.querySelector('input[name=role]:checked'); goal.textContent = c.dataset.goal; desc.textContent = c.dataset.desc; }
  document.querySelectorAll('input[name=role]').forEach(i => i.addEventListener('change', sync)); sync();
</script>
@endsection
