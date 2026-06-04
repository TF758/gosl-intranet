# Fail if .env does not exist
if (!(Test-Path ".env")) {
    Write-Error ".env file not found."
    exit 1
}

# Load environment variables from .env
Get-Content .env | ForEach-Object {

    # Skip comments and empty lines
    if ($_ -match '^\s*#') { return }
    if ($_ -match '^\s*$') { return }

    $name, $value = $_ -split '=', 2

    if ($null -eq $name -or $null -eq $value) {
        return
    }

    # Remove surrounding quotes if present
    $value = $value.Trim('"')

    Set-Item -Path "Env:$name" -Value $value
}

Write-Host "Pulling Docker images..."
docker compose pull

if ($LASTEXITCODE -ne 0) {
    Write-Error "Failed to pull Docker images."
    exit 1
}

Write-Host "Starting Docker containers..."
docker compose up -d

if ($LASTEXITCODE -ne 0) {
    Write-Error "Failed to start Docker containers."
    exit 1
}

Write-Host "Waiting for MySQL to become healthy..."

$dbContainer = docker compose ps -q db

if ([string]::IsNullOrWhiteSpace($dbContainer)) {
    Write-Error "Could not locate database container."
    exit 1
}

$maxAttempts = 30
$attempt = 0

do {
    Start-Sleep -Seconds 2
    $attempt++

    $status = docker inspect `
        --format "{{.State.Health.Status}}" `
        $dbContainer 2>$null

    Write-Host "Database status: $status"

} while ($status -ne "healthy" -and $attempt -lt $maxAttempts)

if ($status -ne "healthy") {
    Write-Error "Database failed to become healthy."
    exit 1
}

Write-Host "Database is healthy."

# Restore database if backup exists
if (Test-Path ".\wordpress-backup.sql") {

    Write-Host "Database backup found. Restoring database..."

    Get-Content ".\wordpress-backup.sql" | docker compose exec -T db mysql `
        --user=root `
        --password="${env:MYSQL_ROOT_PASSWORD}" `
        "${env:MYSQL_DATABASE}"

    if ($LASTEXITCODE -ne 0) {
        Write-Error "Database restore failed."
        exit 1
    }

    Write-Host "Database restored."

} else {

    Write-Host "No database backup found."
    Write-Host "Fresh installation mode."
}

Write-Host "Checking WordPress installation..."

docker compose run --rm wpcli core is-installed *> $null

if ($LASTEXITCODE -ne 0) {

    Write-Host "Fresh installation detected."
    Write-Host "Installing WordPress..."

    docker compose run --rm wpcli core install `
        --url="$env:WP_URL" `
        --title="$env:WP_TITLE" `
        --admin_user="$env:WP_ADMIN_USER" `
        --admin_password="$env:WP_ADMIN_PASSWORD" `
        --admin_email="$env:WP_ADMIN_EMAIL"

    if ($LASTEXITCODE -ne 0) {
        Write-Error "WordPress installation failed."
        exit 1
    }

    Write-Host "WordPress installed."
}

Write-Host "Updating WordPress URLs..."

docker compose run --rm wpcli option update siteurl "$env:WP_URL"
docker compose run --rm wpcli option update home "$env:WP_URL"

Write-Host "WordPress URL updated."

Write-Host ""
Write-Host "WordPress ready!"
Write-Host "Site URL: $env:WP_URL"
Write-Host "phpMyAdmin: http://localhost:8086"