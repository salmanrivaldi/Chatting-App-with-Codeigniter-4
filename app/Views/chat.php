<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<div class="wrapper">
  <header>
    <a href="#" class="back-icon"><i class="fas fa-arrow-left"></i></a>
    <img src="<?= base_url('assets/images/default.png'); ?>" />
    <div class="details">
      <span>Salman Rivaldi</span>
      <p>Online</p>
    </div>
  </header>
  <section class="chat-area">
    <div class="chat-box">
      <!-- Ajax -->
    </div>
    <form action="#" class="typing-area">
      <input type="text" class="incoming_id" name="incoming_id" value="" hidden />
      <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off" />
      <button><i class="fab fa-telegram-plane"></i></button>
    </form>
  </section>
</div>


<?= $this->endSection() ?>