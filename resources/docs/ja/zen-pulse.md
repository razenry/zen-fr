# Zen Pulse & リアルタイム SSE

**Zen Pulse** は、Node.js や外部 JS ビルドツールを必要とせずに動的なインタラクティブ UI を構築できる完全純粋なリアクティブエンジンです。

---

## 1. コンポーネントの生成

```bash
php zen make:pulse Counter
```

生成物：
- `app/pulse/Counter.php` (コンポーネントクラス)
- `app/views/pulse/counter.php` (ビューテンプレート)

---

## 2. コンポーネントの実装

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
