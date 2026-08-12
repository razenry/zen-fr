# Zen Pulse & Real-Time SSE

**Zen Pulse** is a zero-dependency reactive component engine allowing developers to build interactive interfaces without Node.js, Pusher, or complex JavaScript build tools.

---

## 1. Creating a Reactive Component

```bash
php zen make:pulse Counter
```

Generates:
- `app/pulse/Counter.php` (Component Class)
- `app/views/pulse/counter.php` (Component View Template)

---

## 2. Component Class Definition

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
        $this->count += (int)$amount;
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

---

## 3. Component View Binding

```html
<div>
    <input type="text" zen-model="name" value="<?= htmlspecialchars($name) ?>">
    <p>Value: <?= $count ?></p>
    <button zen-click="increment(1)">+1 Increment</button>
</div>
```
