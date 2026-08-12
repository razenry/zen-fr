# 自動テスト (Pest PHP & PHPUnit)

Zen PHP Framework は、**Pest PHP** および **PHPUnit** による現代的な自動テスト環境を標準提供しています。

---

## 1. テストスイートの実行

```bash
php zen test
```

---

## 2. テストファイルの作成

```bash
php zen make:test UserServiceTest
```

---

## 3. Pest テストの書き方

```php
use App\Services\UserService;

test('ユーザー登録の入力検証エラーの確認', function () {
    $userService = new UserService();
    $result = $userService->registerUser([
        'name' => '',
        'email' => '',
        'password' => ''
    ]);

    expect($result['status'])->toBeFalse();
});
```
