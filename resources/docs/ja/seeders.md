# データベース シーダー (Database Seeders)

Zen PHP Framework の **データベースシーダー (Database Seeder)** 機能を使用すると、テストデータや初期マスターデータを自動的かつ構造的に投入できます。

---

## 1. 新しいシーダーの作成

Zen CLI を使用して新規シーダークラスを生成します：

```bash
php zen make:seeder ProductSeeder
```

`database/seeders/ProductSeeder.php` ファイルが生成されます。

---

## 2. シーダークラスの構造

すべてのシーダーは `Database\Seeder` を継承し、`run()` メソッドを実装します：

```php
namespace Database\Seeders;

use Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // 既存データのクリア
        $this->db->query("TRUNCATE TABLE products");
        $this->db->execute();

        $products = [
            [
                'name' => 'Zen Cloud Server',
                'price' => 1250000,
                'description' => '高性能クラウドサーバー。',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Zen Pulse Pro License',
                'price' => 450000,
                'description' => 'リアクティブコンポーネントライセンス。',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        foreach ($products as $p) {
            $this->db->query("INSERT INTO products (name, price, description, created_at) VALUES (:name, :price, :description, :created_at)");
            $this->db->bind(':name', $p['name']);
            $this->db->bind(':price', $p['price']);
            $this->db->bind(':description', $p['description']);
            $this->db->bind(':created_at', $p['created_at']);
            $this->db->execute();
        }
    }
}
```

---

## 3. マスターシーダー (`DatabaseSeeder.php`) への登録

`database/seeders/DatabaseSeeder.php` にて `$this->call()` メソッドを使用して登録します：

```php
namespace Database\Seeders;

use Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        echo "Seeding Users...\n";
        $this->call(UserSeeder::class);

        echo "Seeding Products...\n";
        $this->call(ProductSeeder::class);
    }
}
```

---

## 4. CLI 経由でのシーダー実行

ターミナルで以下のコマンドを実行します：

```bash
# マスター DatabaseSeeder の実行
php zen db:seed

# 特定のシーダーの実行
php zen db:seed ProductSeeder
```
