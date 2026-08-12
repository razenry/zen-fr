# Automated Testing (Pest PHP & PHPUnit)

Zen PHP Framework includes built-in support for modern automated testing using **Pest PHP** and **PHPUnit**.

---

## 1. Running Test Suite

Run all automated unit and feature tests via Zen CLI:

```bash
php zen test
```

---

## 2. Creating Test Files

```bash
php zen make:test UserServiceTest
```

---

## 3. Writing Pest Unit Tests

```php
use App\Services\UserService;

test('register user validation returns error when fields are empty', function () {
    $userService = new UserService();
    $result = $userService->registerUser([
        'name' => '',
        'email' => '',
        'password' => ''
    ]);

    expect($result['status'])->toBeFalse();
});
```
