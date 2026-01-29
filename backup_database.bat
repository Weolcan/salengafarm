@echo off
REM Database Backup Script
REM Run this daily to backup your database

set TIMESTAMP=%date:~-4,4%%date:~-10,2%%date:~-7,2%_%time:~0,2%%time:~3,2%%time:~6,2%
set TIMESTAMP=%TIMESTAMP: =0%

set BACKUP_DIR=database\backups
if not exist %BACKUP_DIR% mkdir %BACKUP_DIR%

set BACKUP_FILE=%BACKUP_DIR%\inventory_backup_%TIMESTAMP%.sql

echo Backing up database...
"C:\Program Files\MySQL\MySQL Server 8.0\bin\mysqldump.exe" -u root -pcloudroot inventory > %BACKUP_FILE%

if %ERRORLEVEL% EQU 0 (
    echo ✓ Backup successful: %BACKUP_FILE%
) else (
    echo ✗ Backup failed!
)

REM Keep only last 7 backups
forfiles /p %BACKUP_DIR% /m *.sql /d -7 /c "cmd /c del @path" 2>nul

pause
