<h1>Main/index.php</h1>
<p><?php echo $name; ?></p>
<p><?php echo $age; ?></p>

<?php foreach ($posts as $post): ?>
    <h3><?php echo $post->title; ?></h3>
<?php endforeach; ?>
