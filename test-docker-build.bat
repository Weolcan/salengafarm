@echo off
echo ========================================
echo Testing Docker Build for Render
echo ========================================
echo.

echo Step 1: Building Docker image...
docker build -t salengap-test .

if %ERRORLEVEL% NEQ 0 (
    echo.
    echo ERROR: Docker build failed!
    echo Check the error messages above.
    pause
    exit /b 1
)

echo.
echo Step 2: Build successful! Starting container...
echo Container will be available at http://localhost:8080
echo Press Ctrl+C to stop the container
echo.

docker run -p 8080:80 ^
    -e APP_NAME=Salengap ^
    -e APP_ENV=local ^
    -e APP_DEBUG=true ^
    -e DB_CONNECTION=sqlite ^
    salengap-test

pause
