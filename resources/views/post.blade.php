<!doctype html>

<title>My Blog</title>
<link rel="stylesheet" href="/app.css">
<body>
<article>
    <h1>
        <a href="/posts/<?= $post->slug; ?>">
        <?= $post->title ?></h1></a>

    <div>
        <?= $post->body ?>
    </div>
</article>

<a href="/">Go Back</a>

</body>

