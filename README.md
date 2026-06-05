# DPSM Intranet - Local Setup

## Requirements

Install:

- Git
- Docker Desktop
- PowerShell

---

## Fresh Machine Setup

### 1. Clone Repository

```powershell
git clone <repository-url>
cd intranet
```

---

### 2. Create Environment File

Create:

```text
.env
```

Populate with the project values.

---

### 3. Restore Backups

Copy the following into:

```text
backups/
```

```text
backups/
├── wordpress-backup.sql
├── uploads.zip
└── .env.backup (optional)
```

---

### 4. Run Initialization Script

```powershell
.\init.ps1
```

The script will:

- Pull Docker images
- Start containers
- Wait for MySQL
- Restore database (if backup exists)
- Restore uploads (if backup exists)
- Install WordPress (if required)
- Update site URLs

---

## Access URLs

### WordPress

```text
http://localhost:8085
```

### Admin

```text
http://localhost:8085/wp-admin
```

### phpMyAdmin

```text
http://localhost:8086
```

---

## Daily Development

Start environment:

```powershell
docker compose up -d
```

Stop environment:

```powershell
docker compose down
```

View logs:

```powershell
docker compose logs -f
```

---

## Before Switching Machines

### 1. Backup

```powershell
.\backup.ps1
```

Expected output:

```text
backups/
├── wordpress-backup.sql
├── uploads.zip
└── .env.backup
```

### 2. Commit Changes

```powershell
git add .
git commit -m "your message"
git push
```

---

## Recovery Checklist

Before restoring on a new machine ensure you have:

```text
✓ Repository
✓ .env
✓ wordpress-backup.sql
✓ uploads.zip
```

Run:

```powershell
.\init.ps1
```

The DPSM Intranet should be restored to the previous working state.
