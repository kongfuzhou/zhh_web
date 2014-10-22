@echo off&setlocal enabledelayedexpansion
set a=5
set b=3
if %a%==5 (set /a a*=b & echo/!a!)
pause