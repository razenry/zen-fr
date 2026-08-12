# Zen Pulse & Real-Time Engine

Zen Pulse adalah engine reaktif zero-dependency bawaan resmi dari Zen PHP Framework yang memungkinkan pengembang membuat antarmuka web dinamis, interaktif, dan real-time tanpa perlu mengoperasikan server Node.js / WebSockets eksternal.

---

## Fitur Utama Zen Pulse

- **Live Data Binding (`zen-model`)**: Mengikat state properti PHP secara real-time dari input form HTML.
- **Action Handling (`zen-click`, `zen-submit`)**: Mengirim trigger event dari UI langsung ke method PHP di server.
- **Automatic Polling (`zen-poll`)**: Mengisi data terbaru secara berkala tanpa interaksi manual.
- **Server-Sent Events (`zen-sse`)**: Streaming event real-time dari server ke browser secara instan.

---

## Membuat Komponen Zen Pulse via CLI

Gunakan perintah `php zen` di terminal:

```bash
php zen make:pulse Counter
```

Perintah ini akan secara otomatis menghasilkan dua berkas:
1. `app/pulse/Counter.php` (Kelas Logika PHP Component)
2. `app/views/pulse/counter.php` (Template Tampilan View)

---

## Contoh Komponen Reaktif

### Kelas Logika (`app/pulse/Counter.php`)

```php
namespace App\Pulse;

use App\Core\ZenPulseComponent;
use App\Core\App;

class Counter extends ZenPulseComponent
{
    public $count = 0;
    public $name = 'Zen Developer';

    public function increment($amount = 1)
    {
        $this->count += $amount;
    }

    public function decrement($amount = 1)
    {
        $this->count -= $amount;
    }

    public function render()
    {
        ob_start();
        App::View('pulse/counter', [
            'count' => $this->count,
            'name'  => $this->name
        ]);
        return ob_get_clean();
    }
}
```

### Template Tampilan (`app/views/pulse/counter.php`)

```html
<div class="p-6 bg-white dark:bg-zinc-800 rounded-xl shadow">
    <h3 class="text-xl font-bold text-zinc-900 dark:text-white">Zen Pulse Counter</h3>

    <!-- Live Data Binding -->
    <input type="text" zen-model="name" value="<?= htmlspecialchars($name) ?>" class="form-input" />
    
    <p>Halo <?= htmlspecialchars($name) ?>, Nilai Hitungan saat ini:</p>
    <div class="text-4xl font-extrabold my-4"><?= $count ?></div>

    <!-- Action Event Buttons -->
    <button zen-click="decrement(1)" class="btn btn-red">- Kurangi</button>
    <button zen-click="increment(1)" class="btn btn-green">+ Tambah</button>
</div>
```

### Memuat Komponen di View / Layout

Gunakan method `ZenPulseComponent::renderComponent()` di dalam View Anda:

```php
use App\Core\ZenPulseComponent;

echo ZenPulseComponent::renderComponent('Counter', ['count' => 5]);
```

Pastikan skrip client `public/js/zen-pulse.js` disertakan pada layout aplikasi Anda:

```html
<script src="<?= baseUrl('public/js/zen-pulse.js') ?>"></script>
```

---

## Real-Time SSE (Server-Sent Events)

Zen PHP menyediakan endpoint streaming real-time di `/_zen/sse`. Untuk mendengarkan update server secara langsung di frontend:

```html
<div zen-sse="ping">
    Server Status: Online
</div>
```

Atau menggunakan event listener di JavaScript:

```javascript
document.addEventListener('zen:realtime', (e) => {
    console.log('Update dari server:', e.detail);
});
```

---

## Keunggulan Performansi

- **Tanpa Dependency Luar**: Murni menggunakan PHP standar dan vanilla JavaScript modern.
- **Ringan & Cepat**: Payload JSON sangat hemat dengan update DOM parsial yang mulus.
- **Performa Masa Kini**: Sangat cocok untuk dashboard interaktif, obrolan real-time, dan aplikasi web modern.
