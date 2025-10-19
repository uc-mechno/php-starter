<?php
// config.php

// エラー表示設定（開発環境用）
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

// セッション設定
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
