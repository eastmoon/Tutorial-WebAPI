單機安裝Web Server環境：

XAMPP Apache + MariaDB + PHP + Perl
https://www.apachefriends.org/zh_tw/index.html

XAMPP 的名字這麼解釋的
X 多系統的意思，因為 XAMPP 支援 Windows、Mac OS、Linux
A Apache 網頁伺服器
M MySQL 資料庫系統 
P PHP 程式語言
P Perl 程式語言

[網站架設] 用電腦架設網站！XAMPP 安裝教學 (Windows篇)
https://www.orztw.com/2014/06/xampp-install-on-windows.html

XAMPP, Apache - Error: Apache shutdown unexpectedly
http://stackoverflow.com/questions/18300377/xampp-apache-error-apache-shutdown-unexpectedly

問題在於本機存在多個可能使用http:80與ssl:443的應用程式
將httpd.conf內的http:80改為8080(可自訂)
將httpd-ssl.conf內的ssl:443改為4433(可自訂)
修改完畢後再啟動伺服器。

網頁資料存取位置為
[system folder]/xampp/htdocs/


輕量虛擬機：

用於單機模擬網路多環境運作。

Docker：
https://philipzheng.gitbooks.io/docker_practice/content/introduction/what.html

