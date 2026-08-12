# Zen CLI (コマンドラインツール)

Zen PHP には、開発の生産性を飛躍的に高める対話型 CLI ツール **Zen CLI** が標準搭載されています。

---

## 利用可能なコマンド

ターミナルで `php zen` を実行すると、利用可能なコマンド一覧が表示されます：

```bash
php zen
```

---

## セットアップ & 初期化

```bash
php zen setup
```

---

## スキャフォールディングジェネレーター

### Repository の作成
```bash
php zen make:repository UserRepository
```

### Service の作成
```bash
php zen make:service UserService
```

### Zen Pulse リアクティブコンポーネントの作成
```bash
php zen make:pulse Counter
```

### RESTful API コントローラーの作成
```bash
php zen make:api-controller Api/v1/ProductController
```

### API Resource DTO の作成
```bash
php zen make:resource ProductResource
```

### HTTP ミドルウェアの作成
```bash
php zen make:middleware AuthMiddleware
```

### Pest テストファイルの作成
```bash
php zen make:test UserServiceTest
```

---

## テスト & 最適化コマンド

```bash
# Pest PHP テストスイートの実行 (0.21秒高速実行)
php zen test

# キャッシュと一時ファイルのクリア
php zen clear

# パフォーマンスの最適化
php zen optimize

# データベースマイグレーション
php zen migrate
php zen migrate:refresh
```
