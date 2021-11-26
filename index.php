<?php
  $request = $_SERVER['REQUEST_URI'];
  switch ($request) {
      case '/sierra/events' :
          require __DIR__ . '/sierra/events.php';
          break;
      case '/slack/events' :
          require __DIR__ . '/slack/events.php';
          break;
      case '/view' :
            require __DIR__ . '/views/contents.php';
            break;
      default:
          http_response_code(404);
          require __DIR__ . '/views/404.php';
          break;
  }
?>