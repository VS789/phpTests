set IE=-Dwebdriver.ie.driver="%cd%\IEDriverServer.exe"
set CHROME=-Dwebdriver.chrome.driver="%cd%\chromedriver.exe"
rem set FIREFOX=-Dwebdriver.firefox.driver="%cd%\geckodriver.exe"

java %CHROME% %IE% -jar selenium-server-standalone-3.4.0.jar