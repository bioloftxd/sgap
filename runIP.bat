echo off

cls

ipconfig
set /p ip=Digite seu ip:

echo Rodando em : (  %ip%:8000  )

php artisan serve --host %ip% --port 8000