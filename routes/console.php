<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('project:setup', function () {
    $this->info("=== Laravel First-Time Setup Script ===\n");

    // ensure project root
    if (! file_exists(base_path('artisan'))) {
        $this->error("No 'artisan' file found. Run this command from your Laravel project root.");
        return 1;
    }

    // create .env if missing
    if (! file_exists(base_path('.env'))) {
        $this->info("Creating .env file from .env.dev.example...");
        copy(base_path('.env.dev.example'), base_path('.env'));
    } else {
        $this->line(".env file already exists.");
    }

    // install Composer dependencies
    $this->info("\nInstalling Composer dependencies...");
    shell_exec("composer install --no-interaction --prefer-dist");

    // generate APP_KEY if missing
    $env = file_get_contents(base_path('.env'));
    if (! str_contains($env, "APP_KEY=base64:")) {
        $this->info("\nGenerating new Laravel app key...");
        Artisan::call('key:generate');
        $this->info(Artisan::output());
    } else {
        $this->line("\nAPP_KEY already exists, skipping generation.");
    }

    // ensure database.sqlite exists
    $sqlitePath = database_path('database.sqlite');

    if (! file_exists($sqlitePath)) {
        $this->info("\nCreating SQLite database file...");
        // Create an empty file
        file_put_contents($sqlitePath, '');
    } else {
        $this->line("\ndatabase.sqlite already exists.");
    }

    // run migrations
    $this->info("\nRunning database migrations...");
    Artisan::call('migrate', ['--force' => true]);
    $this->info(Artisan::output());

    // symbolic link the storage directory
    $this->info("\nLinking the storage directory");
    Artisan::call("storage:link");
    $this->info(Artisan::output());

    $this->info("\nSetup complete!");
});
