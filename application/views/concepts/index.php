<h2><?php echo $title; ?></h2>

<?php foreach ($concepts as $concepts_item): ?>

        <h3><?php echo $concepts_item['title']; ?></h3>
        <div class="main">
                <?php echo $concepts_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('concepts/'.$concepts_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>