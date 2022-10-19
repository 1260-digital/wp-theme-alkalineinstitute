<?php

add_action('login_head', function () {
  echo '<style> #login h1, #backtoblog { display: none; } </style>';
});