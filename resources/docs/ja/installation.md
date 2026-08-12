# インストールとセットアップ

Zen PHP Framework は、Service-Repository パターン、Zen Pulse リアクティブエンジン、Pest PHP テストを備えた現代的で超軽量かつ強力な PHP フレームワークです。

---

## システム要件

- **PHP**: 8.0 以上 (PHP 8.3 / 8.4 完全対応)
- **データベース**: MySQL 5.7+ または MariaDB 10.3+
- **拡張機能**: `pdo`, `pdo_mysql`, `mbstring`, `json`
- **Composer**: 2.0+

---

## 1. Composer によるインストール

推奨されるインストール方法は Composer です：

```bash
composer create-project razenry/zen-php my-app
cd my-app
```

---

## 2. 環境セットアップ (`zen setup`)

Zen CLI を使用して自動セットアップを実行します：

```bash
php zen setup
```

このコマンドは以下を行います：
- `.env.example` から `.env` 環境設定ファイルを生成。
- 必要なディレクトリ構造 (`app/repositories`, `app/services`, `app/pulse`, `tests/Unit`, `tests/Feature`) の作成とアクセス権限制御。
- 開発準備を自動完了。

---

## 3. データベース接続設定

`.env` ファイルを開き、MySQL データベース情報を設定します：

```ini
DB_HOST=localhost
DB_USER=root
DB_PASS=secret
DB_NAME=my_app_db
```

---

## 4. マイグレーションとサーバー起動

マイグレーションの実行：

```bash
php zen migrate
```

ローカル開発サーバーの起動：

```bash
php -S localhost:8000
```

ブラウザで `http://localhost:8000` を開きます！
