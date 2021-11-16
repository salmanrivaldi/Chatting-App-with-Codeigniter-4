<?= $this->extend('templates/auth') ?>

<?= $this->section('content') ?>
<div class="wrapper">
  <h1>Register Form</h1>
  <form class="register">
    <div class="field name">
      <div class="input-area">
        <input type="text" name="name" placeholder="Name" />
        <i class="icon fas fa-user"></i>
        <i class="error error-icon fas fa-exclamation-circle"></i>
      </div>
      <div class="error error-txt"></div>
    </div>
    <div class="field email">
      <div class="input-area">
        <input type="text" name="email" placeholder="Email Address" />
        <i class="icon fas fa-envelope"></i>
        <i class="error error-icon fas fa-exclamation-circle"></i>
      </div>
      <div class="error error-txt"></div>
    </div>
    <div class="field password">
      <div class="input-area">
        <input type="password" name="password" placeholder="Password" />
        <i class="icon fas fa-lock"></i>
        <i class="eye-icon fas fa-eye"></i>
        <i class="error error-icon fas fa-exclamation-circle"></i>
      </div>
      <div class="error error-txt"></div>
    </div>

    <div class="field image">
      <span class="file-wrapper">
        <input type="file" name="img" id="file-input" onchange="previewImg()" />
        <span class="button">Choose a File</span>
        <div class="error error-txt"></div>
      </span>

      <img src="/assets/images/default.png" id="img-preview" />

    </div>

    <input type="submit" value="Continue to Chat" />
  </form>
  <div class="sign-txt">Already signed up? <a href="/">Login now</a></div>
</div>


<?= $this->endSection() ?>