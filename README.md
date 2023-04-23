# flow application

- đầu tiên phần mềm sẽ chạy vào file .htaccess để phân tích cấu hình của url
  index.php?url="data-url";
- vào file index.php ở file index.php sẽ nhận được url ở đối tượng app
  và sẽ required tất cả các file liên quan đến product ở nằm ở file bridge

- vào file app.php tại folder core
  - trong file app.php -> sẽ nhận được url từ file index.php
  - create function UrlProcess() --> handle url
  - khi new đối tượng $myApp = new App(); thì sẽ chạy function \_\_construct() ở class App
  - handles url ->redirect controller with action and params
