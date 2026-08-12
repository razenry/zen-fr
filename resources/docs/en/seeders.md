# Database Seeders

The **Database Seeder** feature in Zen PHP Framework allows developers to populate database tables with sample data, testing data, or initial production records automatically and structurally.

---

## 1. Creating a New Seeder

Use the Zen CLI tool to generate a new seeder class:

```bash
php zen make:seeder ProductSeeder
```

This command creates the file `database/seeders/ProductSeeder.php`.

---

## 2. Seeder Class Structure

Every seeder extends `Database\Seeder` and implements the `run()` method:

```php
namespace Database\Seeders;

use Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Truncate existing data if needed
        $this->db->query("TRUNCATE TABLE products");
        $this->db->execute();

        $products = [
            [
                'name' => 'Zen Cloud Server',
                'price' => 1250000,
                'description' => 'High performance cloud server.',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Zen Pulse Pro License',
                'price' => 450000,
                'description' => 'Reactive components toolkit license.',
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

## 3. Registering Seeders in `DatabaseSeeder.php`

Register individual seeders inside `database/seeders/DatabaseSeeder.php` using `$this->call()`:

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

## 4. Running Seeders via Zen CLI

Run the following command in your terminal:

```bash
# Run Master DatabaseSeeder
php zen db:seed

# Run a specific seeder class
php zen db:seed ProductSeeder
```
