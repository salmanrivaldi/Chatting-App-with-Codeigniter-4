<?php if ($contacts) : ?>
  <?php foreach ($contacts as $contact) : ?>
    <a href="/chat/<?= $contact->user_id; ?>" class="<?= $contact->status == 'Offline' ? 'offline' : ''; ?>">
      <div class="content">
        <img src="<?= base_url("assets/images/user_image/$contact->img"); ?>" />
        <div class="details">
          <span><?= $contact->name; ?></span>
          <p><?= $contact->status; ?></p>
        </div>
      </div>
      <div class="status-dot"><i class="fas fa-circle"></i></div>
    </a>
  <?php endforeach ?>

<?php else : ?>
  <div class="text">No users are available to chat.</div>'
<?php endif ?>