<div class="border-garage shadow-garage">
  <div class="p-2 m-1 border-contenedores bg-white"><h2 class="fs-6 mt-2">TOOLS</h2></div>
  <div class="p-2 m-1 ms-2">We are going to need some tools if we want to build something.</div>
</div>

<?php if (!empty($tools)): ?>
  <?php foreach ($tools as $tool): ?>
    <div class="border-garage shadow-garage mt-3">
      <div class="p-2 m-1 border-contenedores bg-body-secondary"><h3 class="fs-6 mt-2"><?= escape($tool['name']) ?></h3></div>
      <div class="p-2 m-1 ms-2">Added: <?= escape(date('Y/m/d', strtotime($tool['created_at']))) ?></div>
      <div class="p-2 m-1 ms-2">Type: <?= escape($tool['type']) ?></div>
      <div class="p-2 m-1 ms-2">Description: <?= escape($tool['description']) ?></div>
      <div class="p-2 m-1 ms-2 d-flex justify-content-end">
          <a href="<?= escape($tool['url']) ?>" target="_blank" rel="noopener">Link</a>
      </div>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <div class="p-2 m-1 ms-2">No tools found.</div>
<?php endif; ?>
