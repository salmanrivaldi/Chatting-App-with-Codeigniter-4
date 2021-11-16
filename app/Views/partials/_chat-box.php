<?php if ($messages) : ?>
  <?php foreach ($messages as $msg) : ?>
    <?php if ($msg->sender_id == session()->get('user_id')) : ?>
      <div class="chat outgoing">
        <div class="details">
          <p><?= $msg->message; ?></p>
        </div>
      </div>
    <?php else : ?>
      <div class="chat incoming">
        <img src="<?= base_url("assets/images/user_image/$msg->img"); ?>" />
        <div class="details">
          <p><?= $msg->message; ?></p>
        </div>
      </div>
    <?php endif ?>
  <?php endforeach ?>

<?php else : ?>
  <div class="text">No messages are available.</div>'
<?php endif ?>