<?php

namespace Vironeer\Toastr;

use Illuminate\Support\Facades\Session;

class Toastr
{
    /**
     * Display an info toast message.
     *
     * @param  string  $message
     * @param  string|null  $title
     * @return void
     */
    public static function info(string $message, string $title = null)
    {
        self::message('info', $message, $title);
    }

    /**
     * Display a warning toast message.
     *
     * @param  string  $message
     * @param  string|null  $title
     * @return void
     */
    public static function warning(string $message, string $title = null)
    {
        self::message('warning', $message, $title);
    }

    /**
     * Display a success toast message.
     *
     * @param  string  $message
     * @param  string|null  $title
     * @return void
     */
    public static function success(string $message, string $title = null)
    {
        self::message('success', $message, $title);
    }

    /**
     * Display an error toast message.
     *
     * @param  string  $message
     * @param  string|null  $title
     * @return void
     */
    public static function error(string $message, string $title = null)
    {
        self::message('error', $message, $title);
    }

    /**
     * Get the Toastr options as a JavaScript string.
     *
     * @return string
     */
    public function options()
    {
        return 'toastr.options=' . json_encode(config('toastr.options')) . ';';
    }

    /**
     * Get the Toastr notifications as a JavaScript string.
     *
     * @return string|null
     */
    public function notificationsAsString()
    {
        $toast = null;
        if (Session::has('toastr')) {
            $toastr = Session::get('toastr');
            if ($toastr['title']) {
                $toast = "toastr.{$toastr['type']}('{$toastr['message']}', '{$toastr['title']}');";
            } else {
                $toast = "toastr.{$toastr['type']}('{$toastr['message']}');";
            }
        }
        return $toast;
    }

    /**
     * Get the HTML script tag to render Toastr options and notifications.
     *
     * @return string
     */
    public function render()
    {
        return '<script type="text/javascript">' . $this->options() . $this->notificationsAsString() . '</script>';
    }

    /**
     * Get the HTML link tag to include Toastr CSS styles.
     *
     * @return string
     */
    public function styles($version = 'latest')
    {
        return '<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/vironeer/toastr@' . $version . '/dist/css/vironeer-toastr.min.css">';
    }

    /**
     * Get the HTML script tag to include Toastr JavaScript.
     *
     * @return string
     */
    public function scripts($version = 'latest')
    {
        return '<script src="https://cdn.jsdelivr.net/gh/vironeer/toastr@' . $version . '/dist/js/vironeer-toastr.min.js"></script>';
    }

    /**
     * Flash a Toastr message to the session.
     *
     * @param  string  $type
     * @param  string  $message
     * @param  string|null  $title
     * @return void
     */
    private static function message(string $type, string $message, string $title = null)
    {
        Session::flash('toastr', [
            'type' => $type,
            'title' => $title,
            'message' => $message,
        ]);
    }
}