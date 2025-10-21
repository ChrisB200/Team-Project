# Stop script if any command fails
$ErrorActionPreference = "Stop"

Write-Host "=== Laravel First-Time Setup Script ===`n"

# Ensure we are in the Laravel project root
if (-not (Test-Path "artisan")) {
    Write-Error "No 'artisan' file found. Run this script from your Laravel project root."
    exit 1
}

# Step 1: Create .env from example if missing
if (-not (Test-Path ".env")) {
    Write-Host "Creating .env file from .env.example..."
    Copy-Item ".env.example" ".env"
} else {
    Write-Host ".env file already exists."
}

# Step 2: Install Composer dependencies
Write-Host "`nInstalling Composer dependencies..."
composer install --no-interaction --prefer-dist

# Step 3: Generate APP_KEY if missing
$envFile = Get-Content ".env"
if ($envFile -notmatch "APP_KEY=base64:") {
    Write-Host "`nGenerating new Laravel app key..."
    php artisan key:generate
} else {
    Write-Host "`nAPP_KEY already exists, skipping generation."
}

# Step 4: Run migrations
Write-Host "`nRunning database migrations..."
php artisan migrate --force

Write-Host "`n✅ Setup complete!"
