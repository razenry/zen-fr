<?php

return [
    // Global Navigation
    'home' => 'ホーム',
    'about' => '概要',
    'docs' => 'ドキュメント',
    'login' => 'ログイン',
    'register' => '会員登録',
    'logout' => 'ログアウト',
    'footer_rights' => '全著作権所有。',

    // Hero Section
    'hero_title' => 'Zen PHP Framework',
    'hero_subtitle' => '現代的で超軽量、高速かつ強力なPHPフレームワーク。ソロ開発者やチーム向けに、クリーンで反応性の高いエンタープライズアーキテクチャを提供します。',
    'btn_docs' => 'ドキュメントを開く',
    'btn_demo' => 'ライブデモを試す',

    // Patch Notes & Upgrade Badges (Professional Format)
    'badge_patch' => 'PATCH NOTES v2.0 RELEASE',
    'badge_buff' => 'BUFF: PERFORMANCE ENHANCEMENTS',
    'badge_nerf' => 'NERF: CODEBASE PURGE & DEPRECATION',
    'badge_adjust' => 'ADJUSTMENT: SYSTEM REFACTORING',
    'badge_new' => 'NEW: MAJOR FEATURES RELEASE',
    'patch_title' => 'v2.0 エンタープライズリリース パッチノート',
    'patch_subtitle' => 'パフォーマンス強化、主要新機能の追加、および統一システム調整の要約。',
    'upgrade_proc_title' => 'Composer 経由のバージョンアップグレード手順',
    'upgrade_proc_desc' => '最新バージョンにアップグレードするには、プロジェクトターミナルで以下のコマンドを実行します：',

    // Stats Card Labels
    'stat_speed' => 'テスト実行速度',
    'stat_pattern' => 'Service & Repo パターン',
    'stat_realtime' => 'Zen Pulse リアルタイム',
    'stat_api' => 'エンタープライズ API エンジン',

    // Showcase Tabs & Sections
    'showcase_title' => 'ライブ対話型フレームワークデモ',
    'showcase_subtitle' => 'Zen PHP フレームワークの全主要機能をリアルタイムで以下でお試しいただけます。',
    'tab_pulse' => 'Zen Pulse リアクティブ',
    'tab_api' => 'RESTful API テスター',
    'tab_arch' => 'Service & Repository',
    'tab_cli' => 'Zen CLI & シーダー',
    'tab_patch' => 'パッチノート & アップグレード',

    // Zen Pulse Demo Section
    'pulse_embedded_title' => 'ライブ埋め込みコンポーネント',
    'pulse_embedded_desc' => '以下のリアクティブコンポーネントは Zen Pulse Engine (依存関係ゼロ) で動作します。zen-click や zen-model の操作により、ページ全体をリロードすることなく AJAX 経由で DOM が自動更新されます。',
    'pulse_sse_title' => 'リアルタイム SSE モニター',
    'pulse_sse_desc' => 'Zen PHP は /_zen/sse で Server-Sent Events ハンドラーを備えており、サーバーイベントをブラウザに即座にストリーミングします。',
    'pulse_sse_listening' => '/_zen/sse ストリームを受信中...',
    'pulse_info' => 'Node.js、Pusher、Redis は不要です。純粋な PHP と現代的なバニラ JS。',

    // Counter Component Strings
    'counter_title' => 'Zen Pulse リアクティブカウンター',
    'counter_label_input' => 'お名前 (ライブデータバインディング):',
    'counter_placeholder' => 'ここに名前を入力してください...',
    'counter_greeting' => 'こんにちは',
    'counter_current_val' => '現在のカウンター値:',
    'btn_decrement' => '-1 減らす',
    'btn_reset' => 'リセット',
    'btn_increment' => '+1 増やす',
    'btn_rocket' => '+5 ロケット',

    // RESTful API Tester Strings
    'api_tester_title' => 'RESTful API インタラクティブテスター',
    'api_tester_desc' => 'ApiResponse、ApiResource DTO、Validator を使用した統合 RESTful API エンドポイントをテストできます。',
    'api_ping_label' => 'API ヘルス状態を確認',
    'api_products_label' => 'ApiResource DTO 経由で製品を取得',
    'api_val_err_label' => '自動 Validator 422 エラーをテスト',
    'api_output_title' => 'API レスポンス出力',
    'api_awaiting' => 'リクエスト待ち...',
    'api_prompt' => '上のボタンをクリックして、Zen PHP バックエンドに直接 HTTP リクエストを送信します...',

    // Service & Repository Section Strings
    'arch_title' => '製品カタログ (Service & Repository パターン)',
    'arch_desc' => '以下のデータはすべて、Controller で直接データベースクエリを実行することなく、ProductService と ProductRepository を使用して取得されています。',
    'arch_empty' => 'サンプル製品データは ProductService と ProductRepository 経由で管理可能です。`php zen db:seed` を実行してデータを投入してください。',
    'arch_processed' => 'Service & Repository レイヤー経由で処理されました。',

    // CLI & Testing Section Strings
    'cli_title' => 'Zen CLI、シーダー & Pest テスト',
    'cli_desc' => 'ソロ開発およびチーム開発のワークフローを高速化するためのコマンドラインツール (CLI)。',
    'cli_comment_setup' => '// 新規プロジェクトのセットアップ',
    'cli_comment_seeder' => '// データベースシーダーの実行',
    'cli_comment_test' => '// Pest テストスイートの実行 (0.21秒)',
    'cli_comment_scaffold' => '// スキャフォールディングジェネレーター',

    // About Page Strings
    'about_title' => 'Zen PHP Framework について',
    'about_badge' => 'フレームワーク創作者 兼 アーキテクチャ',
    'about_lead' => 'Zen PHP Framework のシンプルさと高速性の背後には、現代のアプリケーション開発者に最高の開発体験 (DX) を届けるという強いビジョンがあります。',
    'about_creator_label' => '創作者 兼 リード開発者',
    'about_creator_name' => 'Razenry',
    'about_creator_title' => 'ソフトウェアアーキテクト 兼 OSSコントリビューター',
    'about_creator_bio' => 'Razenry は、ソロエンジニアとチームの両方に最高の開発体験 (DX) を提供するために Zen PHP フレームワークを設計しました。',
    'about_history_title' => 'Zen PHP の歴史と開発哲学',
    'about_history_body' => 'Zen PHP は、世界中で人気のフレームワークの優れた概念（Laravel風MVCの使いやすさ、Node.js不要のLivewire風リアクティブコンポーネント、厳格なService & Repositoryパターン）を融合させたいという情熱から誕生しました。不必要な依存関係を排除し、非常に軽量で超高速に動作するよう設計されています。',
    'about_blend_title' => '最高の概念の融合:',
    'about_laravel_title' => 'Laravel風 MVC & ルーティング',
    'about_laravel_desc' => '直感的な宣言型ルーティング Route::get() と使い慣れた Controller 構造。',
    'about_livewire_title' => 'Livewire風 リアクティブ',
    'about_livewire_desc' => 'Node.js 依存なしの zen-model および zen-click を備えた Zen Pulse リアクティブコンポーネント。',
    'about_pattern_title' => 'Service & Repository パターン',
    'about_pattern_desc' => 'ビジネスロジックとデータアクセスを分離するエンタープライズ標準の構造化アーキテクチャ。',
    'about_pest_title' => 'Pest テスト & シーダー CLI',
    'about_pest_desc' => '自動 Pest PHP テストランナーのサポートと対話型 php zen db:seed CLI ツール。',

    // Language Labels
    'lang_id' => 'Bahasa Indonesia',
    'lang_en' => 'English',
    'lang_ja' => 'Japanese'
];
