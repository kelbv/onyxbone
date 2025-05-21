<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ONYXBONE — Archive Index</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      max-width: 800px;
      margin: auto;
      padding: 3em 2em;
    }
    h1 {
      margin-bottom: 1em;
      color: var(--highlight);
    }
    ul {
      list-style: none;
      padding-left: 0;
    }
    li {
      margin-bottom: 1.5em;
    }
    .chapter-link {
      font-weight: bold;
      font-size: 1.1em;
      color: var(--link-color);
      text-decoration: none;
      border-bottom: 1px dotted var(--link-color);
    }
    .chapter-link:hover {
      border-bottom: 1px solid var(--link-color);
    }
    .summary {
      font-style: italic;
      color: var(--text-dim);
    }
  </style>
</head>
<body>

<h1>🦳 ONYXBONE: Archive Chapters</h1>
<ul>
<?php
$chapterDir = 'onyxbone_chapters/';
$files = glob($chapterDir . '*.{html,php}', GLOB_BRACE);

// Natural sort and filter
usort($files, function($a, $b) {
    return strnatcmp(basename($a), basename($b));
});

foreach ($files as $file) {
    $filename = basename($file);
    $chapterTitle = preg_replace('/[_\-]/', ' ', preg_replace('/\.\w+$/', '', $filename));
    $chapterTitle = ucwords($chapterTitle);

    echo '<li>';
    echo '<a href="' . htmlspecialchars($file) . '" class="chapter-link">' . htmlspecialchars($chapterTitle) . '</a><br>';
    echo '</li>';
}
?>
</ul>

</body>
</html>
