<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tienda Albiceleste</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
<script>
try{var t=localStorage.getItem('theme')||(matchMedia('(prefers-color-scheme:dark)').matches?'dark':'light');document.documentElement.dataset.theme=t}catch(e){}
</script>
<style>
:root{--paper:#f7fbff;--surface:#ffffff;--ink:#0b2545;--mute:#4f6a86;--line:#cfe0ef;--mark:#f6b40e;--markink:#0b2545;--danger:#b3121f;--celeste:#74acdf;
/* TRANSPARANSI: angka terakhir (.62 / .8) = opacity. Makin kecil makin transparan */
--glass:rgba(255,255,255,.62);--glass-strong:rgba(255,255,255,.8);
/* FOTO BACKGROUND: taruh file di public/images/messi.jpg (atau ganti path di bawah) */
--bg-photo:url('/images/messi.jpg');
--display:'Bricolage Grotesque',system-ui,sans-serif;--body:'Hanken Grotesk',system-ui,sans-serif}
:root[data-theme=dark]{--paper:#0a1a30;--surface:#10264a;--ink:#eaf3fb;--mute:#9db8d3;--line:#223d63;--danger:#ff7b85;--glass:rgba(10,26,48,.55);--glass-strong:rgba(16,38,74,.72)}
*{box-sizing:border-box;margin:0;padding:0}
body{background:var(--bg-photo) center top/cover no-repeat fixed,linear-gradient(180deg,#74acdf,#0b2545) fixed;color:var(--ink);font:400 1rem/1.5 var(--body);min-height:100vh}
body::before{content:'';position:fixed;inset:0;z-index:-1;background:linear-gradient(180deg,rgba(116,172,223,.08),rgba(11,37,69,.5))}

button,input,select{font:inherit;color:inherit}
button{cursor:pointer}
:focus-visible{outline:3px solid var(--mark);outline-offset:2px}

.top{display:flex;justify-content:space-between;align-items:flex-start;gap:1rem}
h1{font:800 clamp(2.6rem,9vw,4.8rem)/.92 var(--display);letter-spacing:-.03em;text-shadow:0 2px 24px rgba(0,0,0,.35)}
.icon-btn{border:1.5px solid var(--ink);background:none;border-radius:999px;padding:.4rem .9rem;font-size:.9rem;font-weight:500}
.icon-btn:hover{background:var(--mark);color:var(--markink);border-color:var(--mark)}

/* ringkasan: satu strip, bukan kartu */
.strip{display:grid;grid-template-columns:repeat(4,1fr);margin:2rem 0 1.5rem;border-block:2px solid var(--ink)}
.strip div{padding:.9rem 1rem;border-left:1px solid var(--line)}
.strip div:first-child{border-left:0;padding-left:0}
.strip span{display:block;font-size:.85rem;color:var(--mute)}
.strip b{font:700 1.35rem var(--display);font-variant-numeric:tabular-nums;overflow-wrap:anywhere}
@media(max-width:700px){.strip{grid-template-columns:1fr 1fr}.strip div:nth-child(3){border-left:0;padding-left:0}.strip div:nth-child(n+3){border-top:1px solid var(--line)}}

.layout{display:grid;grid-template-columns:260px 1fr;gap:2rem;align-items:start}
@media(max-width:820px){.layout{grid-template-columns:1fr}}

/* form tambah */
.add{background:var(--glass-strong);-webkit-backdrop-filter:blur(12px);backdrop-filter:blur(12px);border:1.5px solid var(--ink);border-radius:14px;padding:1.25rem;position:sticky;top:1rem}
.add h2{font:700 1.25rem var(--display);margin-bottom:1rem}
.field{display:flex;flex-direction:column;gap:.25rem;margin-bottom:1rem}
.field label{font-size:.85rem;color:var(--mute)}
.field input{background:transparent;border:0;border-bottom:2px solid var(--ink);border-radius:0;padding:.45rem 0;font-weight:500;font-size:1.05rem;width:100%}
.field input:focus-visible{outline:0;background:var(--mark);color:var(--markink)}
.hint{font-size:.85rem;color:var(--mute);min-height:1.3em;font-variant-numeric:tabular-nums}
.btn{width:100%;background:var(--ink);color:var(--paper);border:0;border-radius:10px;padding:.7rem 1rem;font-weight:600;transition:transform .15s}
.btn:hover{transform:translateY(-2px)}
.btn:disabled{opacity:.5;cursor:wait}
.btn.ghost{background:none;color:var(--ink);border:1.5px solid var(--ink)}
.btn.danger{background:var(--danger);color:#fff}

/* toolbar */
.bar{display:flex;flex-wrap:wrap;gap:.6rem;margin-bottom:1rem}
.bar input,.bar select{background:var(--glass-strong);border:1.5px solid var(--line);border-radius:10px;padding:.55rem .8rem}
.bar input{flex:1 1 180px}
.bar input:focus,.bar select:focus{border-color:var(--ink);outline:0}
.bar .icon-btn{border-radius:10px;border-color:var(--line)}

/* tabel */
.tbl{overflow-x:auto;border:1.5px solid var(--ink);border-radius:14px;background:var(--glass-strong);-webkit-backdrop-filter:blur(12px);backdrop-filter:blur(12px)}
table{width:100%;border-collapse:collapse;min-width:520px}
th{text-align:left;font-weight:500;font-size:.85rem;color:var(--mute);padding:.75rem 1rem;border-bottom:2px solid var(--ink)}
td{padding:.8rem 1rem;border-bottom:1px solid var(--line);vertical-align:middle}
tr:last-child td{border-bottom:0}
tbody tr:hover{background:color-mix(in srgb,var(--mark) 14%,transparent)}
.id{color:var(--mute);font-variant-numeric:tabular-nums}
.nm{font:600 1.05rem var(--display);overflow-wrap:anywhere}
.pr{font:600 1rem var(--display);font-variant-numeric:tabular-nums;white-space:nowrap}
.acts{display:flex;gap:.4rem;justify-content:flex-end}
.b{border:1.5px solid var(--ink);background:none;border-radius:8px;padding:.3rem .7rem;font-size:.85rem;font-weight:600;display:inline-flex;align-items:center;gap:.3rem;transition:background .15s,color .15s}
.b svg{width:14px;height:14px}
.b.detail:hover{background:var(--ink);color:var(--paper)}
.b.edit{border-color:#c9a000}
.b.edit:hover{background:var(--mark);color:var(--markink);border-color:var(--mark)}
.b.del{border-color:var(--danger);color:var(--danger)}
.b.del:hover{background:var(--danger);color:#fff}
@media(max-width:560px){.b span{display:none}.col-id{display:none}}

.sk td div{height:1rem;border-radius:6px;background:linear-gradient(90deg,var(--line),transparent,var(--line));background-size:200% 100%;animation:sh 1.2s linear infinite}
@keyframes sh{to{background-position:-200% 0}}
.state{padding:2.5rem 1rem;text-align:center;color:var(--mute)}
.state.err{color:var(--danger)}
.state button{background:none;border:0;text-decoration:underline;text-underline-offset:3px;font-weight:600}
.pager{display:flex;justify-content:space-between;align-items:center;margin-top:1rem;font-size:.9rem;color:var(--mute)}
.pager div{display:flex;gap:.5rem}
.pager button{border:1.5px solid var(--line);background:var(--glass-strong);border-radius:8px;padding:.35rem .8rem}
.pager button:disabled{opacity:.4;cursor:default}

/* dialog */
dialog{margin:auto;border:2px solid var(--ink);border-radius:16px;background:var(--paper);color:var(--ink);padding:1.75rem;width:min(92vw,420px)}
dialog::backdrop{background:rgba(10,16,30,.55)}
dialog[open]{animation:pop .2s ease-out}
@keyframes pop{from{transform:translateY(8px);opacity:0}}
dialog h2{font:800 1.5rem var(--display);letter-spacing:-.02em;margin-bottom:1.1rem}
dl{display:grid;grid-template-columns:auto 1fr;gap:.6rem 1.25rem}
dt{color:var(--mute)} dd{font-weight:500;overflow-wrap:anywhere}
.foot{display:flex;gap:.6rem;justify-content:flex-end;margin-top:1.4rem}
.foot .btn{width:auto;padding:.6rem 1.2rem}
.toast{position:fixed;left:50%;bottom:1.5rem;transform:translate(-50%,200%);background:var(--ink);color:var(--paper);padding:.7rem 1.2rem;border-radius:999px;transition:transform .3s;z-index:10;max-width:90vw}
.toast.show{transform:translate(-50%,0)}
.toast.err{background:var(--danger);color:#fff}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}}

/* hero + bendera */
.hero{position:relative;min-height:min(48vh,400px);display:flex;align-items:flex-end;padding:clamp(1.25rem,4vw,3rem) 1rem 2.5rem;overflow:hidden}
.hero-in{max-width:1020px;margin:0 auto;width:100%;position:relative;z-index:1;color:#fff}
.stars{letter-spacing:.4em;color:var(--mark);font-size:1.1rem;margin-bottom:.6rem}
.sub{margin-top:.8rem;opacity:.92;font-size:1.05rem}
.hero-act{display:flex;gap:.5rem;margin-top:1.2rem;flex-wrap:wrap}
.hero .icon-btn{color:#fff;border-color:rgba(255,255,255,.85);background:rgba(11,37,69,.35);backdrop-filter:blur(4px);cursor:pointer}
.hero .icon-btn:hover{background:var(--mark);color:var(--markink);border-color:var(--mark)}
.ten{position:absolute;right:clamp(.5rem,5vw,4rem);bottom:-1.2rem;font:800 clamp(8rem,28vw,17rem)/1 var(--display);color:transparent;-webkit-text-stroke:2px rgba(255,255,255,.5);pointer-events:none;user-select:none}
.sheet{position:relative;max-width:1020px;margin:0 auto;background:var(--glass);-webkit-backdrop-filter:blur(14px) saturate(1.2);backdrop-filter:blur(14px) saturate(1.2);border-radius:20px 20px 0 0;padding:2.4rem clamp(1rem,3vw,2rem) 3rem;min-height:55vh}
.flag{position:absolute;inset:0 0 auto 0;height:14px;border-radius:20px 20px 0 0;background:linear-gradient(var(--celeste) 0 33.3%,#fff 0 66.6%,var(--celeste) 0)}
.flag::after{content:'';position:absolute;left:50%;top:50%;width:12px;height:12px;border-radius:50%;background:var(--mark);transform:translate(-50%,-50%);box-shadow:0 0 0 2px #fff}
.strip{margin-top:0}
.strip b{color:var(--ink)}
.strip div:first-child b{color:inherit}

/* batas kartu: bingkai tegas + bayangan celeste */
.add,.tbl,.slider{border:2px solid var(--ink);box-shadow:6px 6px 0 var(--celeste)}
.sheet{border:2px solid rgba(255,255,255,.75);border-bottom:0}

/* slider trofi */
.vitrina{margin-top:2.75rem}
.vh{display:flex;justify-content:space-between;align-items:baseline;gap:.5rem 1rem;flex-wrap:wrap;margin-bottom:1rem}
.vh h2{font:800 1.6rem var(--display);letter-spacing:-.02em}
.vh span{color:var(--mute);font-size:.9rem}
.slider{border-radius:14px;background:var(--glass-strong);-webkit-backdrop-filter:blur(12px);backdrop-filter:blur(12px);padding:1.1rem 0 .7rem}
.vp{overflow:hidden;-webkit-mask-image:linear-gradient(90deg,transparent,#000 5%,#000 95%,transparent);mask-image:linear-gradient(90deg,transparent,#000 5%,#000 95%,transparent)}
.track{display:flex;width:max-content;animation:slide var(--dur,30s) linear infinite}
.slider:hover .track{animation-play-state:paused}
@keyframes slide{to{transform:translateX(-50%)}}
.tcard{width:240px;margin:0 1rem 0 0;flex:none}
.tcard img,.ph{display:block;width:100%;aspect-ratio:4/5;object-fit:cover;border-radius:10px;border:2px solid var(--ink)}
.ph{display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;border-style:dashed;color:var(--mute);padding:1rem;font-size:.9rem}
.ph small{word-break:break-all;margin-top:.3rem}
.tcard figcaption{font:600 .95rem var(--display);padding:.5rem .2rem 0}
@media(max-width:560px){.tcard{width:190px}}
@media(prefers-reduced-motion:reduce){.vp{overflow-x:auto;-webkit-mask-image:none;mask-image:none}}
</style>
</head>
<body>
<header class="hero">
  <div class="hero-in">
    <div class="stars">★ ★ ★</div>
    <h1>Tienda<br>Albiceleste</h1>
    <p class="sub">Katalog produk · ¡Vamos, Argentina!</p>
    <div class="hero-act">
      <button class="icon-btn" id="themeBtn" aria-label="Ganti tema">Mode gelap</button>
      <label class="icon-btn" for="photoIn">Ganti foto latar</label>
      <input type="file" id="photoIn" accept="image/*" hidden>
    </div>
  </div>
  <span class="ten" aria-hidden="true">10</span>
</header>

<main class="sheet">
  <div class="flag"></div>
<div class="strip">
    <div><span>Total produk</span><b id="sTotal">0</b></div>
    <div><span>Harga rata-rata</span><b id="sAvg">Rp 0</b></div>
    <div><span>Termahal</span><b id="sMax">-</b></div>
    <div><span>Respon API</span><b id="sPing">-</b></div>
  </div>

  <div class="layout">
    <form class="add" id="productForm">
      <h2>Tambah produk</h2>
      <div class="field"><label for="name">Nama produk</label><input id="name" placeholder="Keyboard mekanik" required autocomplete="off" maxlength="255"></div>
      <div class="field"><label for="price">Harga (Rp)</label><input id="price" type="number" min="0" placeholder="1500000" required autocomplete="off"><div class="hint" id="pv"></div></div>
      <button class="btn" id="submitBtn">Tambah produk</button>
    </form>

    <section>
      <div class="bar">
        <input id="q" type="search" placeholder="Cari nama atau ID  (tekan /)" aria-label="Cari produk">
        <select id="sort" aria-label="Urutkan">
          <option value="new">Terbaru</option>
          <option value="old">Terlama</option>
          <option value="az">Nama A–Z</option>
          <option value="low">Harga termurah</option>
          <option value="high">Harga termahal</option>
        </select>
        <button class="icon-btn" id="csvBtn">Ekspor CSV</button>
      </div>

      <div class="tbl">
        <table>
          <thead><tr><th class="col-id">ID</th><th>Produk</th><th>Harga</th><th style="text-align:right">Aksi</th></tr></thead>
          <tbody id="rows"></tbody>
        </table>
        <div class="state" id="state" hidden></div>
      </div>
      <div class="pager" id="pager"><span id="count"></span>
        <div><button id="prev">Sebelumnya</button><button id="next">Berikutnya</button></div>
      </div>
    </section>
  </div>
  <section class="vitrina" aria-label="Koleksi trofi">
    <div class="vh"><h2>Vitrina de trofeos</h2><span>Koleksi trofi Lionel Messi · geser otomatis, arahkan kursor untuk berhenti</span></div>
    <div class="slider"><div class="vp" id="vp"><div class="track" id="track"></div></div></div>
  </section>
</main>

<dialog id="detailModal">
  <h2>Detail produk</h2>
  <dl><dt>ID</dt><dd id="dId"></dd><dt>Nama</dt><dd id="dName"></dd><dt>Harga</dt><dd id="dPrice"></dd><dt>Dibuat</dt><dd id="dCreated"></dd><dt>Diubah</dt><dd id="dUpdated"></dd></dl>
  <div class="foot"><button class="btn" onclick="detailModal.close()">Tutup</button></div>
</dialog>

<dialog id="editModal">
  <h2>Ubah produk</h2>
  <form id="editForm">
    <input type="hidden" id="editId">
    <div class="field"><label for="editName">Nama produk</label><input id="editName" required maxlength="255"></div>
    <div class="field"><label for="editPrice">Harga (Rp)</label><input id="editPrice" type="number" min="0" required></div>
    <div class="foot"><button type="button" class="btn ghost" onclick="editModal.close()">Batal</button><button class="btn" id="saveBtn">Simpan perubahan</button></div>
  </form>
</dialog>

<dialog id="delModal">
  <h2>Hapus produk?</h2>
  <p id="delText" style="color:var(--mute)"></p>
  <div class="foot"><button class="btn ghost" onclick="delModal.close()">Batal</button><button class="btn danger" id="delBtn">Hapus produk</button></div>
</dialog>

<div class="toast" id="toast" role="status"></div>

<script>
const API_URL = '/api/products', PER = 8;
const $ = id => document.getElementById(id);
const rp = n => 'Rp ' + new Intl.NumberFormat('id-ID').format(n);
const esc = s => String(s).replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
const HEAD = { 'Accept': 'application/json', 'Content-Type': 'application/json' };
const unwrap = j => (j && !Array.isArray(j) && j.data !== undefined) ? j.data : j;
const fmtDate = d => d ? new Date(d).toLocaleString('id-ID') : '-';
const ICON = {
  eye: '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>',
  pen: '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4z"/></svg>',
  trash: '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6"/></svg>'
};

let all = [], page = 1, ping = null, delId = null, toastTimer;

function toast(msg, isErr = false) {
  const t = $('toast');
  t.textContent = msg;
  t.className = 'toast show' + (isErr ? ' err' : '');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => t.classList.remove('show'), 3000);
}

async function errorText(res) {
  try {
    const d = await res.json();
    if (d.errors) return Object.values(d.errors).flat().join(', ');
    if (d.message) return d.message;
  } catch (_) {}
  return 'Server menjawab dengan status ' + res.status + '.';
}

/* ---------- tampilan ---------- */
function filtered() {
  const q = $('q').value.trim().toLowerCase();
  const sorts = {
    new: (a, b) => b.id - a.id, old: (a, b) => a.id - b.id,
    az: (a, b) => a.name.localeCompare(b.name), low: (a, b) => a.price - b.price, high: (a, b) => b.price - a.price
  };
  return all.filter(p => !q || p.name.toLowerCase().includes(q) || String(p.id) === q).sort(sorts[$('sort').value]);
}

function renderStats() {
  const n = all.length;
  $('sTotal').textContent = n;
  $('sAvg').textContent = rp(n ? Math.round(all.reduce((a, p) => a + Number(p.price), 0) / n) : 0);
  const top = all.reduce((m, p) => (!m || p.price > m.price) ? p : m, null);
  $('sMax').textContent = top ? rp(top.price) : '-';
  $('sPing').textContent = ping === null ? '-' : ping + ' ms';
}

function render() {
  renderStats();
  const list = filtered();
  const pages = Math.max(1, Math.ceil(list.length / PER));
  page = Math.min(page, pages);
  const slice = list.slice((page - 1) * PER, page * PER);

  $('rows').innerHTML = slice.map(p => `
    <tr>
      <td class="col-id id">#${String(p.id).padStart(4, '0')}</td>
      <td class="nm">${esc(p.name)}</td>
      <td class="pr">${rp(p.price)}</td>
      <td><div class="acts">
        <button class="b detail" onclick="viewProduct(${p.id})" title="Detail">${ICON.eye}<span>Detail</span></button>
        <button class="b edit" onclick="editProduct(${p.id})" title="Ubah">${ICON.pen}<span>Ubah</span></button>
        <button class="b del" onclick="askDelete(${p.id})" title="Hapus">${ICON.trash}<span>Hapus</span></button>
      </div></td>
    </tr>`).join('');

  const st = $('state');
  st.className = 'state';
  st.hidden = slice.length > 0;
  if (!slice.length) st.textContent = all.length ? 'Tidak ada produk yang cocok dengan pencarian.' : 'Belum ada produk. Isi form di samping untuk menambah yang pertama.';
  $('count').textContent = list.length ? `Menampilkan ${slice.length} dari ${list.length} produk` : '';
  $('prev').disabled = page <= 1;
  $('next').disabled = page >= pages;
  $('pager').style.visibility = list.length > PER ? 'visible' : 'hidden';
}

function skeleton() {
  $('rows').innerHTML = Array(4).fill('<tr class="sk"><td class="col-id"><div style="width:2.5rem"></div></td><td><div style="width:70%"></div></td><td><div style="width:5rem"></div></td><td><div style="width:8rem;margin-left:auto"></div></td></tr>').join('');
  $('state').hidden = true;
}

/* ---------- API ---------- */
async function fetchProducts() {
  skeleton();
  try {
    const t0 = performance.now();
    const res = await fetch(API_URL, { headers: HEAD });
    ping = Math.round(performance.now() - t0);
    if (!res.ok) throw new Error(await errorText(res));
    const data = unwrap(await res.json());
    if (!Array.isArray(data)) throw new Error('Format respons tidak dikenali.');
    all = data;
    render();
  } catch (e) {
    all = [];
    $('rows').innerHTML = '';
    renderStats();
    const st = $('state');
    st.hidden = false;
    st.className = 'state err';
    st.innerHTML = esc(e.message || 'Tidak bisa terhubung ke API.') + '<br><button onclick="fetchProducts()">Coba lagi</button>';
  }
}

async function getOne(id) {
  const res = await fetch(`${API_URL}/${id}`, { headers: HEAD });
  if (!res.ok) throw new Error(await errorText(res));
  return unwrap(await res.json());
}

$('productForm').addEventListener('submit', async e => {
  e.preventDefault();
  const btn = $('submitBtn');
  btn.disabled = true;
  try {
    const res = await fetch(API_URL, { method: 'POST', headers: HEAD, body: JSON.stringify({ name: $('name').value, price: $('price').value }) });
    if (!res.ok) return toast(await errorText(res), true);
    e.target.reset();
    $('pv').textContent = '';
    toast('Produk ditambahkan.');
    page = 1;
    fetchProducts();
  } catch (_) { toast('Gagal terhubung ke server.', true); }
  finally { btn.disabled = false; }
});

async function viewProduct(id) {
  try {
    const p = await getOne(id);
    $('dId').textContent = '#' + String(p.id).padStart(4, '0');
    $('dName').textContent = p.name;
    $('dPrice').textContent = rp(p.price);
    $('dCreated').textContent = fmtDate(p.created_at);
    $('dUpdated').textContent = fmtDate(p.updated_at);
    $('detailModal').showModal();
  } catch (e) { toast(e.message, true); }
}

async function editProduct(id) {
  try {
    const p = await getOne(id);
    $('editId').value = p.id;
    $('editName').value = p.name;
    $('editPrice').value = p.price;
    $('editModal').showModal();
  } catch (e) { toast(e.message, true); }
}

$('editForm').addEventListener('submit', async e => {
  e.preventDefault();
  const btn = $('saveBtn');
  btn.disabled = true;
  try {
    const res = await fetch(`${API_URL}/${$('editId').value}`, { method: 'PUT', headers: HEAD, body: JSON.stringify({ name: $('editName').value, price: $('editPrice').value }) });
    if (!res.ok) return toast(await errorText(res), true);
    $('editModal').close();
    toast('Perubahan disimpan.');
    fetchProducts();
  } catch (_) { toast('Gagal menyimpan perubahan.', true); }
  finally { btn.disabled = false; }
});

function askDelete(id) {
  const p = all.find(x => x.id === id);
  delId = id;
  $('delText').textContent = `"${p ? p.name : '#' + id}" akan dihapus permanen dan tidak bisa dikembalikan.`;
  $('delModal').showModal();
}

$('delBtn').addEventListener('click', async () => {
  const btn = $('delBtn');
  btn.disabled = true;
  try {
    const res = await fetch(`${API_URL}/${delId}`, { method: 'DELETE', headers: HEAD });
    if (!res.ok) return toast(await errorText(res), true);
    $('delModal').close();
    toast('Produk dihapus.');
    fetchProducts();
  } catch (_) { toast('Gagal menghapus produk.', true); }
  finally { btn.disabled = false; }
});

/* ---------- fitur tambahan ---------- */
$('q').addEventListener('input', () => { page = 1; render(); });
$('sort').addEventListener('change', () => { page = 1; render(); });
$('prev').addEventListener('click', () => { page--; render(); });
$('next').addEventListener('click', () => { page++; render(); });
$('price').addEventListener('input', e => { $('pv').textContent = e.target.value ? rp(e.target.value) : ''; });

$('csvBtn').addEventListener('click', () => {
  const list = filtered();
  if (!list.length) return toast('Tidak ada data untuk diekspor.', true);
  const cell = v => '"' + String(v ?? '').replace(/"/g, '""') + '"';
  const csv = ['id,nama,harga,dibuat'].concat(list.map(p => [p.id, p.name, p.price, p.created_at].map(cell).join(','))).join('\n');
  const a = document.createElement('a');
  a.href = URL.createObjectURL(new Blob(['\ufeff' + csv], { type: 'text/csv;charset=utf-8' }));
  a.download = 'produk.csv';
  a.click();
  URL.revokeObjectURL(a.href);
  toast(`${list.length} produk diekspor.`);
});

function syncThemeLabel() { $('themeBtn').textContent = document.documentElement.dataset.theme === 'dark' ? 'Mode terang' : 'Mode gelap'; }
$('themeBtn').addEventListener('click', () => {
  const next = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
  document.documentElement.dataset.theme = next;
  try { localStorage.setItem('theme', next); } catch (_) {}
  syncThemeLabel();
});

document.addEventListener('keydown', e => {
  if (e.key === '/' && !/INPUT|TEXTAREA|SELECT/.test(document.activeElement.tagName)) { e.preventDefault(); $('q').focus(); }
});
document.querySelectorAll('dialog').forEach(d => d.addEventListener('click', e => { if (e.target === d) d.close(); }));

// ganti foto latar langsung dari browser (disimpan di browser ini)
function setPhoto(url) { document.documentElement.style.setProperty('--bg-photo', `url("${url}")`); }
try { const saved = localStorage.getItem('bgPhoto'); if (saved) setPhoto(saved); } catch (_) {}
$('photoIn').addEventListener('change', e => {
  const f = e.target.files[0];
  if (!f) return;
  const r = new FileReader();
  r.onload = () => {
    setPhoto(r.result);
    try { localStorage.setItem('bgPhoto', r.result); toast('Foto latar diganti.'); }
    catch (_) { toast('Foto dipakai sementara (terlalu besar untuk disimpan). Simpan ke public/images/messi.jpg agar permanen.', true); }
  };
  r.readAsDataURL(f);
});

/* ---------- slider trofi ---------- */
// TAMBAH FOTO DI SINI: simpan file ke public/images/trofi/ lalu tambahkan satu baris baru.
const TROPHIES = [
  { src: '/images/world-cup.jpg', caption: 'Piala Dunia 2022' },
  { src: '/images/copa-america21.avif', caption: 'Copa América 2021' },
  { src: '/images/finalissima.jpg', caption: 'Finalissima 2022' },
  { src: '/images/copa-america-24.jpg', caption: 'Copa América 2024' },
  { src: '/images/ballondor.jpg', caption: "Ballon d'Or" }
];
const SPEED = 60; // px per detik: makin besar makin cepat

function imgFail(img) {
  const d = document.createElement('div');
  d.className = 'ph';
  d.innerHTML = 'Foto belum ada<small></small>';
  d.querySelector('small').textContent = img.getAttribute('src');
  img.replaceWith(d);
}

function buildSlider() {
  const track = $('track'), vp = $('vp');
  if (!TROPHIES.length) { document.querySelector('.vitrina').hidden = true; return; }
  const card = t => `<figure class="tcard"><img src="${esc(t.src)}" alt="${esc(t.caption)}" onerror="imgFail(this)"><figcaption>${esc(t.caption)}</figcaption></figure>`;
  const one = TROPHIES.map(card).join('');
  track.innerHTML = one;
  const unit = track.offsetWidth;                       // lebar satu set (lebar kartu tetap, jadi akurat)
  const reps = Math.max(1, Math.ceil(vp.clientWidth / unit));
  const half = one.repeat(reps);                        // diulang sampai selebar layar, lalu digandakan agar loop mulus
  track.innerHTML = half + half;
  track.style.setProperty('--dur', (unit * reps / SPEED) + 's');
}
let resizeT;
window.addEventListener('resize', () => { clearTimeout(resizeT); resizeT = setTimeout(buildSlider, 250); });

syncThemeLabel();
fetchProducts();
buildSlider();
</script>
</body>
</html>