<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<div class="wrapper">
  <header>
    <div class="content">
      <img src="<?= base_url("assets/images/user_image/$user->img"); ?>" />
      <div class="details">
        <span><?= $user->name; ?></span>
        <p><?= $user->status; ?></p>
      </div>
    </div>
    <a href="/logout" class="logout">Logout</a>
  </header>

  <section class="users">
    <div class="search">
      <span class="text">Select an user to start chat</span>
      <input type="text" placeholder="Enter name to search...">
      <button><i class="fas fa-search"></i></button>
    </div>

    <div class="users-list">
      <!-- Ajax -->
    </div>

  </section>
</div>


<?= $this->endSection() ?>