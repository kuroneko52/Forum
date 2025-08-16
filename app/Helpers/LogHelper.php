<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class LogHelper
{
    // ログレベルの定義
    const LEVEL_DEBUG = 'debug';
    const LEVEL_INFO = 'info';
    const LEVEL_WARNING = 'warning';
    const LEVEL_ERROR = 'error';
    const LEVEL_CRITICAL = 'critical';

    // チャンネル名の定義
    const CHANNEL_DEBUG = 'debug';
    const CHANNEL_INFO = 'info';
    const CHANNEL_WARNING = 'warning';
    const CHANNEL_ERROR = 'error';
    const CHANNEL_CRITICAL = 'critical';

    /**
    * ログを記録する
    *
    * @param string $level ログレベル
    * @param string $message ログメッセージ
    * @param array $context コンテキストデータ
    * @param string|null $channel ログチャンネル（指定しない場合はデフォルト）
    */
    public static function log($level, $message, array $context = [], $channel = null)
    {
        if ($channel) {
            Log::channel($channel)->$level($message, $context);
        } else {
            Log::$level($message, $context);
        }
    }

    /**
    * デバッグログを記録する
    *
    * @param string $message ログメッセージ
    * @param array $context コンテキストデータ
    * @param string|null $channel ログチャンネル（指定しない場合はデフォルト）
    */
    public static function debug($message, array $context = [])
    {
        self::log(self::LEVEL_DEBUG, $message, $context, self::CHANNEL_DEBUG);
    }

    /**
    * 情報ログを記録する
    *
    * @param string $message ログメッセージ
    * @param array $context コンテキストデータ
    * @param string|null $channel ログチャンネル（指定しない場合はデフォルト）
    */
    public static function info($message, array $context = [])
    {
        self::log(self::LEVEL_INFO, $message, $context, self::CHANNEL_INFO);
    }

    /**
    * 警告ログを記録する
    *
    * @param string $message ログメッセージ
    * @param array $context コンテキストデータ
    * @param string|null $channel ログチャンネル（指定しない場合はデフォルト）
    */
    public static function warning($message, array $context = [])
    {
        self::log(self::LEVEL_WARNING, $message, $context, self::CHANNEL_WARNING);
    }

    /**
    * エラーログを記録する
    *
    * @param string $message ログメッセージ
    * @param array $context コンテキストデータ
    * @param string|null $channel ログチャンネル（指定しない場合はデフォルト）
    */
    public static function error($message, array $context = [])
    {
        self::log(self::LEVEL_ERROR, $message, $context, self::CHANNEL_ERROR);
    }

    /**
    * 重大なエラーログを記録する
    *
    * @param string $message ログメッセージ
    * @param array $context コンテキストデータ
    * @param string|null $channel ログチャンネル（指定しない場合はデフォルト）
    */
    public static function critical($message, array $context = [])
    {
        self::log(self::LEVEL_CRITICAL, $message, $context, self::CHANNEL_CRITICAL);
    }
}

