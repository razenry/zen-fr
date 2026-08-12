# パッチノート & バージョンアップグレード手順 (v2.0 リリース)

**Zen PHP Framework v2.0 Enterprise Release** の公式リリースノートへようこそ。本リリースは、パフォーマンス強化（BUFF）、不要コード削除（NERF）、システム調整（ADJUSTMENT）、および主要新機能（NEW MAJOR FEATURES）を要約しています。

---

## リリース パッチノート要約 (v2.0 リリース)

<div class="p-3 mb-3 bg-success bg-opacity-10 border border-success rounded-3">
    <h5 class="fw-bold text-success m-0"><i class="bi bi-check-circle-fill me-2"></i> NEW: MAJOR FEATURES RELEASE</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>データベースシーダーエンジン (<code>php zen db:seed</code>)</strong>: CLI経由でサンプルデータおよびマスターデータを自動投入。</li>
        <li><strong>エンタープライズ Service & Repository パターン</strong>: ビジネスロジックとデータアクセスを分離する構造化アーキテクチャ。</li>
        <li><strong>トリプル言語エンジン (i18n)</strong>: インドネシア語、英語、日本語をサポートする言語切替機能。</li>
        <li><strong>CLI ユーティリティ <code>zen clear</code> & <code>zen optimize</code></strong>: キャッシュクリアとプロダクション最適化。</li>
    </ul>
</div>

<div class="p-3 mb-3 bg-primary bg-opacity-10 border border-primary rounded-3">
    <h5 class="fw-bold text-primary m-0"><i class="bi bi-lightning-charge-fill me-2"></i> BUFF: PERFORMANCE ENHANCEMENTS</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>Pest PHP テスト速度向上 (0.21秒)</strong>: テスト実行速度を0.21秒に高速化。</li>
        <li><strong>Zen Pulse リアクティブ性</strong>: Node.js 不要で <code>zen-click</code> および <code>zen-model</code> の反応性を向上。</li>
        <li><strong>サブフォルダ <code>baseUrl</code> 自動判定</strong>: サブフォルダ環境での動的 URL 解決。</li>
    </ul>
</div>

<div class="p-3 mb-3 bg-danger bg-opacity-10 border border-danger rounded-3">
    <h5 class="fw-bold text-danger m-0"><i class="bi bi-x-circle-fill me-2"></i> NERF: CODEBASE PURGE & DEPRECATION</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>レガシーモノリスコードの全削除</strong>: 古いモノリシックコードを完全に削除し軽量化。</li>
        <li><strong>不要依存関係の排除</strong>: 最適化のため不要なライブラリを除去。</li>
    </ul>
</div>

<div class="p-3 mb-3 bg-warning bg-opacity-10 border border-warning rounded-3">
    <h5 class="fw-bold text-dark m-0"><i class="bi bi-sliders me-2"></i> ADJUSTMENT: SYSTEM REFACTORING</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>ナビゲーションバー UI の統一</strong>: ドキュメントとメインページのヘッダー UI を100%統一。</li>
        <li><strong>入力フォーカス保持機能</strong>: ライブラインディング入力時のカーソル位置を自動維持。</li>
    </ul>
</div>

---

## Composer 経由のアップグレード手順

以前 `razenry/zen-php` をインストールされた場合、以下の手順で最新バージョンに安全にアップグレードできます：

### ステップ 1: Composer パッケージの更新
ターミナルを開き、以下を実行します：

```bash
composer update razenry/zen-php
```

### ステップ 2: 一時キャッシュのクリア

```bash
php zen clear
```

### ステップ 3: マイグレーションの実行

```bash
php zen migrate
```

### ステップ 4: データベースシーダーの実行

```bash
php zen db:seed
```

### ステップ 5: パフォーマンスの最適化

```bash
php zen optimize
```

Zen PHP Framework プロジェクトが v2.0 Enterprise Release に正常にアップグレードされました。
