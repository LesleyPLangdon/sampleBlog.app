<!doctype html>

<title>My Blog</title>
<link rel="stylesheet" href="/app.css">
<body>
<?php foreach ($posts as $post) : ?>
<article>
    <h1> <?= $post->title; ?> </h1>

    <div>

    </div>
</article>
<?php endforeach; ?>
</body>
