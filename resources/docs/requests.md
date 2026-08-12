# Request Object Abstraction

Zen PHP Framework menyediakan objek **`App\Core\Request`** untuk mengelola HTTP Request (input data GET, POST, JSON payload, File Uploads, Headers, dan IP) secara berorientasi objek yang aman dan ekspresif.

---

## Mengakses Objek Request

### 1. Injeksi Otomatis pada Controller (Recommended)
Setiap method Controller action dapat menggunakan type-hint `App\Core\Request $request` secara otomatis:

```php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        // ...
    }
}
```

### 2. Global Helper `request()`
Anda juga dapat menggunakan fungsi helper global `request()` di manapun pada aplikasi:

```php
// Mengambil nilai input
$name = request('name', 'Guest');

// Mengambil seluruh instance Request
$request = request();
if ($request->isMethod('POST')) {
    // ...
}
```

---

## Mengambil Input Request

| Method | Deskripsi |
| :--- | :--- |
| `$request->input('key', 'default')` | Mengambil data input dari GET, POST, atau JSON body. |
| `$request->all()` | Mengambil seluruh data input gabungan sebagai Array. |
| `$request->get('key', 'default')` | Mengambil data query string (GET). |
| `$request->post('key', 'default')` | Mengambil data form POST. |
| `$request->json('key', 'default')` | Mengambil payload JSON (`php://input`). |
| `$request->has('key')` | Memeriksa apakah kunci input ada. |
| `$request->filled('key')` | Memeriksa apakah input ada dan tidak kosong. |
| `$request->only(['name', 'email'])` | Mengambil hanya kunci spesifik. |
| `$request->except(['password'])` | Mengambil semua input kecuali kunci tertentu. |

---

## Validasi Input Request

Anda dapat menjalankan validasi langsung dari objek Request:

```php
public function register(Request $request)
{
    $validator = $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email',
        'password' => 'required|min:8'
    ]);

    if ($validator->fails()) {
        return $this->view('auth/register', [
            'errors' => $validator->errors()
        ]);
    }
}
```

---

## Pengunggahan File (`UploadedFile`)

Objek `$request->file('key')` mengembalikan instance `App\Core\UploadedFile` yang terintegrasi langsung dengan engine `Storage`:

```php
if ($request->file('avatar')) {
    $file = $request->file('avatar');

    if ($file->isValid()) {
        $path = $file->store('avatars', 'public');
        // $path mengembalikan lokasi file terunggah, misal: 'avatars/a1b2c3d4.png'
    }
}
```

---

## Mengakses Header, IP & Method

```php
// Memeriksa Method HTTP
if ($request->isMethod('POST')) { ... }

// Deteksi Jenis Format
if ($request->isJson()) { ... }
if ($request->wantsJson()) { ... }
if ($request->isAjax()) { ... }

// Header & IP
$token = $request->header('Authorization');
$ip = $request->ip();
$userAgent = $request->userAgent();
```
