@echo off
%CD%\..\vendor\bin\tester.bat %CD%\Forms -s -j 40 -log %CD%\forms.log %*
rmdir %CD%\tmp /Q /S
