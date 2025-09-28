<div class="border-garage shadow-garage">
  <div class="p-2 m-1 border-contenedores bg-white"><h2 class="fs-6 mt-2">HOME</h2></div>
  <div class="p-2 m-1 ms-2 mt-3">Welcome friend, this is my sanctuary a place to chill, relax and let ideas flow..</div>
</div>

<?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
      <div class="border-garage shadow-garage mt-3">
        <div class="p-2 m-1 border-contenedores bg-body-secondary"><h2 class="fs-6 mt-2"><?= escape(date('Y/m/d', strtotime($post['created_at']))) ?> - <?= escape($post['title']) ?></h2></div>
        <div class="p-2 m-1 ms-2 mt-3"><?= $post['content_html'] ?></div>
      </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="p-2 m-1 ms-2">
        <p>No posts found.</p>
    </div>
<?php endif; ?>