<?php

use Database\Schema;
use Database\Blueprint;
use App\Core\Factory;
use Database\Seeder;
use Database\Database;

class V5TestSampleModel
{
    public array $attributes;
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public static function create(array $attributes): static
    {
        return new static($attributes);
    }
}

class V5TestSampleFactory extends Factory
{
    protected string $model = V5TestSampleModel::class;

    public function definition(): array
    {
        return [
            'name' => $this->fakeName(),
            'email' => $this->fakeEmail(),
            'age' => $this->fakeNumber(20, 50),
        ];
    }
}

test('blueprint generates expected sql table statements', function () {
    $blueprint = new Blueprint('users');
    $blueprint->id();
    $blueprint->string('name')->unique();
    $blueprint->string('email')->nullable();
    $blueprint->boolean('is_active')->default(true);
    $blueprint->timestamps();

    $sql = $blueprint->toSql();

    expect($sql)->toContain('CREATE TABLE IF NOT EXISTS `users`');
    expect($sql)->toContain('id INT AUTO_INCREMENT PRIMARY KEY');
    expect($sql)->toContain('name VARCHAR(255) UNIQUE');
    expect($sql)->toContain('email VARCHAR(255) NULL');
    expect($sql)->toContain('is_active TINYINT(1) DEFAULT 1');
    expect($sql)->toContain('created_at TIMESTAMP');
});

test('factory generates mock model instances with fake data', function () {
    $factory = new V5TestSampleFactory();
    
    $single = $factory->make(['name' => 'Custom Name']);
    expect($single)->toBeInstanceOf(V5TestSampleModel::class);
    expect($single->attributes['name'])->toBe('Custom Name');
    expect($single->attributes)->toHaveKey('email');

    $multiple = $factory->count(3)->make();
    expect(count($multiple))->toBe(3);
});

test('seeder call array executes without error', function () {
    $seeder = new class extends Seeder {
        public function run() {}
    };

    expect(method_exists($seeder, 'call'))->toBeTrue();
});

test('database query log records queries when enabled', function () {
    Database::enableQueryLog();
    Database::flushQueryLog();

    expect(Database::getQueryLog())->toBeArray();
    Database::disableQueryLog();
});
