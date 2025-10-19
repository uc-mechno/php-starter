<?php

/**
 * functions.php
 */

require_once __DIR__ . '/config.php';

/**
 * アセットファイルのパスを取得（相対パス）
 */
function asset($path)
{
  // 現在のスクリプトからルートディレクトリまでの相対パスを計算
  $script_dir = dirname($_SERVER['SCRIPT_NAME']);

  // ルートディレクトリの場合は空文字、サブディレクトリの場合は深さを計算
  if ($script_dir === '/' || $script_dir === '') {
    $relative_path = '';
  } else {
    $depth = substr_count(trim($script_dir, '/'), '/') + 1;
    $relative_path = str_repeat('../', $depth);
  }

  return $relative_path . 'development/' . ltrim($path, '/');
}

/**
 * インクルードファイルのパスを取得（相対パス）
 */
function include_path($file)
{
  // 現在のスクリプトからルートディレクトリまでの相対パスを計算
  $script_dir = dirname($_SERVER['SCRIPT_NAME']);

  // ルートディレクトリの場合は空文字、サブディレクトリの場合は深さを計算
  if ($script_dir === '/' || $script_dir === '') {
    $relative_path = '';
  } else {
    $depth = substr_count(trim($script_dir, '/'), '/') + 1;
    $relative_path = str_repeat('../', $depth);
  }

  return $relative_path . 'includes/' . $file;
}
