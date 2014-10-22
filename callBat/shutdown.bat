@echo off
set a=3600
set h=1
(set /a a*=h & echo/!a!)

shutdown.exe -s -t %a%

@echo -------------------notice start--------------------------- 
@echo your computer will be close in %h% hours later
@echo -------------------notice end--------------------------- 

pause