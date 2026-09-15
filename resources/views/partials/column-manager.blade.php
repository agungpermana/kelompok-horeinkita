{{-- Penggunaan: @include('partials.column-manager', ['key' => 'nama-unik-tabel']) --}}
<style>
.wk-col-manager{display:flex;align-items:center;justify-content:flex-end;position:relative;padding:12px 16px;border-bottom:1px solid rgba(198,196,217,.4);background:#fff}
.wk-col-btn{display:inline-flex;align-items:center;gap:6px;padding:8px 14px;font:500 13px/1 Inter,system-ui,sans-serif;color:#0800b5;background:rgba(8,0,181,.08);border:1px solid transparent;border-radius:8px;cursor:pointer;transition:background .15s,box-shadow .15s}
.wk-col-btn:hover{background:rgba(8,0,181,.16)}
.wk-col-btn:focus{outline:none;box-shadow:0 0 0 2px rgba(8,0,181,.25)}
.wk-col-panel{position:absolute;right:16px;top:calc(100% - 4px);z-index:50;min-width:210px;max-height:340px;overflow:auto;background:#fff;border:1px solid #c6c4d9;border-radius:10px;box-shadow:0 8px 24px rgba(11,28,48,.15);padding:6px;display:none}
.wk-col-panel.wk-open{display:block}
.wk-col-head{font:600 11px/1.3 Inter,system-ui,sans-serif;color:#767588;letter-spacing:.04em;text-transform:uppercase;padding:6px 8px}
.wk-col-item{display:flex;align-items:center;gap:8px;width:100%;text-align:left;padding:8px;border:none;background:transparent;border-radius:6px;cursor:pointer;font:400 13px/1.2 Inter,system-ui,sans-serif;color:#0b1c30;box-sizing:border-box}
.wk-col-item:hover{background:#eff4ff}
.wk-col-item input{accent-color:#0800b5;cursor:pointer;margin:0}
.wk-col-reset{border-top:1px solid #eff4ff;color:#767588;border-radius:6px}
.wk-col-count{font:500 11px/1.3 Inter,system-ui,sans-serif;color:#5457a1;background:rgba(8,0,181,.1);border-radius:9999px;padding:2px 8px}
</style>
<script>
(function () {
    function init() {
        var table = document.querySelector('table');
        if (!table || !table.querySelector('thead')) return;

        var headers = Array.prototype.slice.call(table.querySelectorAll('thead th'));
        if (!headers.length) return;

        var cols = headers.map(function (th, i) {
            return { index: i, label: (th.textContent || '').trim().replace(/\s+/g, ' ') };
        });

        var key = 'wapen-table-cols-' + {{ Js::from($key) }};

        var hidden = [];
        try { hidden = JSON.parse(localStorage.getItem(key) || '[]') || []; } catch (e) { hidden = []; }
        if (!Array.isArray(hidden)) hidden = [];

        function apply() {
            cols.forEach(function (c) {
                var isHidden = hidden.indexOf(c.index) !== -1;
                headers[c.index].style.display = isHidden ? 'none' : '';
                table.querySelectorAll('tbody tr').forEach(function (tr) {
                    var td = tr.children[c.index];
                    if (td && td.tagName === 'TD') td.style.display = isHidden ? 'none' : '';
                });
            });
        }

        function saveAndApply() {
            localStorage.setItem(key, JSON.stringify(hidden));
            apply();
        }

        var toolbar = document.createElement('div');
        toolbar.className = 'wk-col-manager';

        var panel = document.createElement('div');
        panel.className = 'wk-col-panel';

        var head = document.createElement('div');
        head.className = 'wk-col-head';
        head.textContent = 'Tampilkan kolom';
        panel.appendChild(head);

        cols.forEach(function (c) {
            if (c.label === 'Aksi') return;
            var labelEl = document.createElement('label');
            labelEl.className = 'wk-col-item';
            var cb = document.createElement('input');
            cb.type = 'checkbox';
            cb.checked = hidden.indexOf(c.index) === -1;
            cb.setAttribute('data-col-index', c.index);
            cb.addEventListener('change', function () {
                hidden = cb.checked
                    ? hidden.filter(function (i) { return i !== c.index; })
                    : hidden.concat(c.index);
                saveAndApply();
            });
            var span = document.createElement('span');
            span.textContent = c.label;
            labelEl.appendChild(cb);
            labelEl.appendChild(span);
            panel.appendChild(labelEl);
        });

        var reset = document.createElement('button');
        reset.type = 'button';
        reset.className = 'wk-col-item wk-col-reset';
        reset.textContent = 'Reset kolom';
        reset.addEventListener('click', function (e) {
            e.stopPropagation();
            hidden = [];
            panel.querySelectorAll('input[type="checkbox"]').forEach(function (cb) { cb.checked = true; });
            saveAndApply();
        });
        panel.appendChild(reset);

        var btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'wk-col-btn';
        btn.innerHTML = '<span aria-hidden="true">&#9881;</span> Kolom';
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            panel.classList.toggle('wk-open');
        });

        toolbar.appendChild(panel);
        toolbar.appendChild(btn);

        table.parentNode.insertBefore(toolbar, table);

        document.addEventListener('click', function (e) {
            if (!toolbar.contains(e.target)) panel.classList.remove('wk-open');
        });

        apply();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
</script>