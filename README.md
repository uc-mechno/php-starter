# PHP Starter Template

簡易的なPHP Webサイト開発用のスターターテンプレートです。  
BrowserSyncによるライブリロードに対応。

## 📁 ファイル構造

```
.
├── index.php                     # メインページ
├── README.md                     # このファイル
├── .editorconfig                 # エディタ設定
├── .prettierrc                   # Prettierフォーマット設定
├── .prettierignore              # Prettier除外設定
├── bs-config.js                 # BrowserSync設定
├── css-order.md                 # CSS記述順序ガイド
├── config/                      # 設定ディレクトリ
│   ├── config.php              # 基本設定
│   └── functions.php           # 共通関数
├── development/                 # 開発用アセット
│   ├── css/                    # CSSファイル
│   ├── img/                    # 画像ファイル
│   └── js/                     # JavaScriptファイル
├── includes/                    # インクルード用PHPファイル
│   ├── breadcrumb.php          # パンくずナビゲーション
│   ├── favicon.php             # ファビコン設定
│   ├── font.php                # フォント読み込み
│   ├── footer.php              # フッター
│   ├── gtag-body.php           # Google Tag Manager (body)
│   ├── gtag-head.php           # Google Tag Manager (head)
│   ├── header.php              # ヘッダー
│   ├── json-ld.php             # 構造化データ
│   ├── lib.php                 # 外部ライブラリ
│   ├── top-about.php           # トップページ - About セクション
│   ├── top-hero.php            # トップページ - ヒーローセクション
│   └── top-news.php            # トップページ - ニュースセクション
└── .vscode/                     # VSCode設定
    ├── cspell.json             # スペルチェック設定
    ├── csscomb.json            # CSS整形設定
    ├── settings.json           # エディタ設定
    └── tasks.json              # タスク設定
```

## 🚀 セットアップ

### 1. 必要な環境
- PHP 7.4以上
- Node.js 18以上

### 1. 必要なパッケージ
browser-syncのインストール（グローバル）
```
% npm install -g browser-sync
```

### 2. 開発環境の起動

#### VSCodeタスク使用（推奨）
```bash
# VSCodeでプロジェクトを開く
code .

# Ctrl+Shift+P → "タスク：タスクの実行（Tasks: Run Task"） → "Start PHP + BrowserSync"を選択
```

#### 手動起動
```bash
# PHPサーバーを起動
php -S localhost:3000 -t .

# 別ターミナルでBrowserSyncを起動
npx browser-sync start --proxy 'localhost:3000' --files '**/*.php, **/*.scss, **/*.js' --port 4000
```

開発サーバー: http://localhost:4000

## 📝 主な機能

### 1. 共通関数

#### `asset($path)`
開発用アセットファイルのパスを取得
```php
echo asset('img/logo.png'); 
// output: ../development/img/logo.png (サブディレクトリ内から)
// output: development/img/logo.png (ルートから)
```

#### `include_path($file)`
includeファイルのパスを取得
```php
include(include_path('header.php'));
// includes/header.php を適切な相対パスで読み込み
```

## 🛠️ 使用方法

### 新しいページの追加
1. ルートディレクトリに新しいPHPファイルを作成
2. 基本テンプレート構造をコピー：

```php
<?php
require_once('config/functions.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <?php include(include_path('gtag-head.php')); ?>
  <?php include(include_path('favicon.php')); ?>
  <?php include(include_path('font.php')); ?>
  <?php include(include_path('lib.php')); ?>
  <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>">
  <title>ページタイトル</title>
</head>
<body>
  <?php include(include_path('gtag-body.php')); ?>
  
  <div class="wrapper">
    <?php include(include_path('header.php')); ?>
    
    <main class="main">
      <!-- メインコンテンツ -->
    </main>
    
    <?php include(include_path('footer.php')); ?>
  </div>
</body>
</html>
```

### サブディレクトリでの使用
サブディレクトリ内にページを作成する場合も、`asset()`と`include_path()`関数が自動的に適切な相対パスを生成します。

### スタイルの編集
- メインスタイル: [`development/css/style.scss`](development/css/style.scss)
- Live Sass Compilerが自動的にCSSを生成
- CSS記述順序は[`css-order.md`](css-order.md)を参照

## 📦 静的サイト生成

開発完了後、静的サイトとして書き出すことができます：

```bash
wget --mirror --convert-links --adjust-extension --page-requisites --no-parent http://localhost:3000/
```

オプション説明：
- `--mirror`: ミラーリングモード（再帰的に全部取得）
- `--convert-links`: リンクを相対パスに置換
- `--adjust-extension`: 拡張子を .html に自動変更
- `--page-requisites`: CSS/JS/画像も保存

生成されたファイルを `dist/` ディレクトリに移動すれば、静的ホスティングサービスで公開できます。

## ⚙️ VSCode拡張機能

このプロジェクトは以下の拡張機能に対応しています：

- **Live Sass Compiler**: SCSS自動コンパイル
- **Prettier**: コード整形
- **CSSComb**: CSS プロパティ並び替え
- **PHP Intelephense**: PHP言語サポート

## 🔧 設定ファイル

- [`.editorconfig`](.editorconfig): エディタ統一設定
- [`.prettierrc`](.prettierrc): Prettierフォーマット設定
- [`bs-config.js`](bs-config.js): BrowserSync詳細設定
- [`.vscode/settings.json`](.vscode/settings.json): VSCode プロジェクト設定

## 📚 最後に

このスターターファイルは簡単にHTMLのようにPHPサイトを構築できるように作成しました。  
必要に応じてカスタマイズしてご利用ください（あまり関数など追加しすぎると、逆に複雑になる可能性がありますので注意してください）
