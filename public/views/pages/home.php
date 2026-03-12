<div class="border-garage shadow-garage">
  <div class="p-2 m-1 border-contenedores bg-white"><h2 class="fs-6 mt-2">HOME</h2></div>
  <div class="p-2 m-1 ms-2 mt-3">Welcome friend, this is my sanctuary a place to chill, relax and let ideas flow..</div>
</div>

<div class="border-garage shadow-garage mt-3">
  <div class="p-2 m-1 border-contenedores bg-body-secondary">
    <h2 class="fs-6 mt-2">Sticky Post – 2026–2027 Roadmap</h2>
  </div>

  <div class="p-2 m-1 ms-2 mt-3">
    <p>
      I won’t start any new projects until at least 80% of my current ones are completed.
    </p>

    <ul>
      <li><s>AWS Cloud Essentials – Knowledge Badge Assessment</s></li>
      <li>AWS Certified Cloud Practitioner</li>
      <li>Introduction to Linux (LFS101) - Starting this one.</li>
      <li>Continue toward AWS Solutions Architect Associate (if I finish the three above, at least begin this one).</li>
      <li><s>Start a personal exploration project: a video game using the NASA API and Kaplay library.</s> - Started the project, on going at 10% currently.</li>
      <li><s>Start a personal exploration project: one affiliate marketing site built exclusively with HTML / HTML + PHP / or Astro.</s> - Finally, I will create another one for more exploration and testing I like the affiliation subject.</b></li>
      <li>Finish personal exploration project: “El Observador”. - This one is moving 75% done</li>
      <li>Finish personal exploration project: “PocketAdmin”.</li>
      <li>Finish personal exploration project: sports platform system with my friend Mariano. - This one is moving 50% done</li>
      <li>Personal exploration project: build something inside the AWS environment using Brazil and Amazon Code.</li>
      <li>Continue practicing React. - I'm on it.</li>
      <li>Continue practicing JavaScript. - I'm on it.</li>
      <li>Start learning some Python and begin training AI models using Kaggle.</li>
      <li>Read 4 books this year. - One down, three to go.</li>
    </ul>
  </div>
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