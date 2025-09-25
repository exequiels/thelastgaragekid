<div class="border-garage shadow-garage">
  <div class="p-2 m-1 border-contenedores bg-white"><h2 class="fs-6 mt-2">PROJECTS</h2></div>
  <div class="p-2 m-1 ms-2">A collection of my life and coding experiments.</div>
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

<div class="border-garage shadow-garage mt-3">
  <div class="p-2 m-1 border-contenedores bg-body-secondary">
    <h3 class="fs-6 mt-2">2025/09/02 - The Last Garage Kid</h3>
  </div>
  <div class="p-2 m-1 ms-2">
    <h3 class="fs-6">What is this project about or how did it start?</h3>
    <p class="mt-3">
      A place to practice PHP, I'm very thankfull with php and I want to continue with it, besides I like retro style websites so I wanted to create mine with some basic stuff and reinforce fundamentals.
    </p>
    <p>Link: 
      <a href="https://thelastgaragekid.com" target="_blank" rel="noopener">
        thelastgaragekid.com
      </a>
    </p>
    <h3 class="fs-6">What I've used for this project?</h3>
    <ul class="mt-2">
      <li>
        Html, PHP, CSS, Bootstrap
      </li>
    </ul>
    <p>
      Github Repo:
      <a href="https://github.com/exequiels/thelastgaragekid" target="_blank" rel="noopener">
        thelastgaragekid
      </a>
    </p>
  </div>
</div>