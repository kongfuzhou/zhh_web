@Rem 接受用户输入的参数
choice /c dme
if errorlevel 3 goto defrag 
if errorlevel 2 goto mem
if errorlevel 1 goto end
:defrag
echo defrag
goto end
:mem
mem
goto end
:end
echo good bye
puase