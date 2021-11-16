<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<div class="wrapper">
  <header>
    <a href="/contact" class="back-icon"><i class="fas fa-arrow-left"></i></a>
    <img src="<?= base_url("assets/images/user_image/$other_user->img"); ?>" />
    <div class="details">
      <span><?= $other_user->name; ?></span>
      <p class="<?= $other_user->status == 'Offline' ? 'offline' : ''; ?>"><?= $other_user->status; ?></p>
    </div>
  </header>
  <section class="chat-area">

    <div class="chat-box">
      <!-- Ajax -->
    </div>

    <form class="typing-area">
      <input type="hidden" class="receiver_id" name="receiver_id" value="<?= $other_user->user_id; ?>" />
      <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off" />
      <button type="submit"><i class="fab fa-telegram-plane"></i></button>
    </form>
  </section>
</div>


<?= $this->endSection() ?>