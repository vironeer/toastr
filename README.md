# Vironeer Toastr for Laravel

Vironeer Toastr is a Laravel package that provides an easy way to display toast notifications in your Laravel applications.

![Vironeer Toastr](https://cdn.vironeer.com/github/nRaAYW9TQI.jpg)


## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Configuration](#configuration)
- [Contributing](#contributing)
- [License](#license)

## Installation

To get started with Vironeer Toastr, follow these steps:

### Prerequisites

- Laravel 8+
- PHP 8.0 or higher
- Composer

### Install the Package

You can install the package via Composer:

```bash
composer require vironeer/toastr
```

### Publish Configuration

Publish the package configuration file to customize Toastr settings:

```bash
php artisan vendor:publish --tag=config
```

### Setup Assets 

You can use (CDN) assets and render Toastr notifications :

```blade
@toastrStyles {{-- use the latest styles version --}}
@toastrStyles(1.0) {{-- use a specific styles version --}}

@toastrScripts {{-- use the latest scripts version --}}
@toastrScripts(1.0) {{-- use a specific scripts version --}}

@toastrRender
```

Or you can publish the assets (CSS and JS) to your public directory:

```bash
php artisan vendor:publish --tag=toastr-assets
```

And include them in your HTML page:
```blade
<!DOCTYPE html>
<html>
<head>
    <!-- Include Toastr CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/toastr/css/vironeer-toastr.min.css') }}">
</head>
<body>
    <!-- Your HTML content -->
    
    <!-- Include Toastr JavaScript -->
    <script src="{{ asset('vendor/toastr/js/vironeer-toastr.min.js') }}"></script>
    @toastrRender
</body>
</html>
```

## Usage

You can display Toastr notifications anywhere in your Laravel application using the provided helper function or facade:

### Using the Helper Function

```php
// Display an info notification
toastr()->info('This is an info message', 'Info');

// Display a success notification
toastr()->success('This is a success message', 'Success');

// Display a warning notification
toastr()->warning('This is a warning message', 'Warning');

// Display an error notification
toastr()->error('This is an error message', 'Error');
```

### Using the Facade

You can also use the Toastr facade to display notifications:

```php
use Toastr;

// Display an info notification
Toastr::info('This is an info message', 'Info');

// Display a success notification
Toastr::success('This is a success message', 'Success');

// Display a warning notification
Toastr::warning('This is a warning message', 'Warning');

// Display an error notification
Toastr::error('This is an error message', 'Error');
```

## Configuration

You can customize Toastr settings by modifying the configuration file located at config/toastr.php. Here you can specify notification options, duration, position, and more.
```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Toastr Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration file allows you to customize the behavior and appearance
    | of Toastr notifications.
    |
     */

    'options' => [

        /*
        |--------------------------------------------------------------------------
        | Default Notification Duration
        |--------------------------------------------------------------------------
        |
        | The default duration (in milliseconds) for how long a notification will
        | be displayed on the screen before it automatically disappears.
        |
         */

        'duration' => 3000,

        /*
        |--------------------------------------------------------------------------
        | Show/Hide Animation Duration
        |--------------------------------------------------------------------------
        |
        | The duration (in milliseconds) for the show and hide animations of the
        | notification.
        |
         */

        'animationDuration' => 400,

        /*
        |--------------------------------------------------------------------------
        | Progress Bar
        |--------------------------------------------------------------------------
        |
        | Enable or disable the progress bar that indicates the remaining time
        | for auto-closing notifications.
        |
         */

        'progressBar' => true,

        /*
        |--------------------------------------------------------------------------
        | Auto-Close Notifications
        |--------------------------------------------------------------------------
        |
        | Enable or disable auto-closing of notifications after the specified
        | duration.
        |
         */

        'autoClose' => true,

        /*
        |--------------------------------------------------------------------------
        | Close Button
        |--------------------------------------------------------------------------
        |
        | Enable or disable the close button on notifications.
        |
         */

        'closeButton' => true,

        /*
        |--------------------------------------------------------------------------
        | Close Button Icon
        |--------------------------------------------------------------------------
        |
        | Customize the icon for the close button (if enabled).
        |
         */

        'closeButtonIcon' => 'toast-close-icon',

        /*
        |--------------------------------------------------------------------------
        | Notification Position Class
        |--------------------------------------------------------------------------
        |
        | Set the position class for notifications (toast-top-right, toast-top-center, toast-top-left,
        | toast-bottom-right, toast-bottom-center, toast-bottom-left).
        |
         */

        'positionClass' => 'toast-top-right',

        /*
        |--------------------------------------------------------------------------
        | Show Notification Icons
        |--------------------------------------------------------------------------
        |
        | Enable or disable the display of icons in notifications.
        |
         */

        'showIcon' => true,

        /*
        |--------------------------------------------------------------------------
        | Icon Classes
        |--------------------------------------------------------------------------
        |
        | Define custom icon classes for different notification types.
        |
         */

        'icons' => [
            'info' => 'toast-info-icon',
            'warning' => 'toast-warning-icon',
            'success' => 'toast-success-icon',
            'error' => 'toast-error-icon',
        ],

        /*
        |--------------------------------------------------------------------------
        | Notification Color Classes
        |--------------------------------------------------------------------------
        |
        | Define custom color classes for different notification types.
        |
         */

        'colorsClasses' => [
            'info' => 'toast-info',
            'warning' => 'toast-warning',
            'success' => 'toast-success',
            'error' => 'toast-error',
        ],
    ],

];
```

## Contributing

We welcome contributions from the community. If you find a bug, have a feature request, or want to improve the package, please open an issue or submit a pull request.

## License

## License

This package is open-source software and is licensed under the [MIT License](LICENSE).

You are free to use, modify, and distribute this package in your projects, both personal and commercial. However, we kindly request that you include the original license notice and attribution when using this package in your projects.

For the full text of the MIT License, see the [LICENSE](LICENSE) file included in this repository.

## Contact

For support, questions, or feedback, please don't hesitate to reach out to us:

- Email: [support@vironeer.com](mailto:support@vironeer.com)

We value your input and are here to assist you with any inquiries or assistance you may need.

