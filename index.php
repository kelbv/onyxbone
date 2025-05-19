<?php
$chapterDir = __DIR__ . "/onyxbone_chapters";
$chapterFiles = glob($chapterDir . "/*.html");
usort($chapterFiles, SORT_NATURAL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ONYXBONE Index</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background: var(--background);
      color: var(--text-main);
      font-family: var(--font-body);
      max-width: 800px;
      margin: 0 auto;
      padding: 4em 2em;
    }
    h1 {
      color: var(--highlight);
    }
    ul {
      list-style: none;
      padding-left: 0;
    }
    li {
      margin-bottom: 1.2em;
    }
    a {
      font-weight: bold;
      color: var(--link-color);
      text-decoration: none;
      border-bottom: 1px dotted var(--link-color);
    }
    a:hover {
      border-bottom: 1px solid var(--link-color);
    }
  </style>
</head>
<body>

  <h1>📖 ONYXBONE: Archive Chapters</h1>

  <ul>
    <?php foreach ($chapterFiles as $file):
      $filename = basename($file);
      $relativePath = "onyxbone_chapters/" . $filename;
      if (preg_match('/(\d+)_([a-z_]+)\.html/', $filename, $matches)) {
        $number = ltrim($matches[1], '0');
        $titleRaw = ucwords(str_replace('_', ' ', $matches[2]));
        $title = "Chapter $number — $titleRaw";
      } else {
        $title = $filename;
      }
    ?>
      <li><a href="<?= htmlspecialchars($relativePath) ?>"><?= htmlspecialchars($title) ?></a></li>
    <?php endforeach; ?>
  </ul>

</body>
</html>
