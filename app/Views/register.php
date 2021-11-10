<?= $this->extend('templates/auth') ?>

<?= $this->section('content') ?>

<div class="wrapper">
  <h1>Register Form</h1>
  <form action="#">
    <div class="field name">
      <div class="input-area">
        <input type="text" placeholder="Name" />
        <i class="icon fas fa-user"></i>
        <i class="error error-icon fas fa-exclamation-circle"></i>
      </div>
      <div class="error error-txt">Name can't be blank</div>
    </div>
    <div class="field email">
      <div class="input-area">
        <input type="text" placeholder="Email Address" />
        <i class="icon fas fa-envelope"></i>
        <i class="error error-icon fas fa-exclamation-circle"></i>
      </div>
      <div class="error error-txt">Email can't be blank</div>
    </div>
    <div class="field password">
      <div class="input-area">
        <input type="password" placeholder="Password" />
        <i class="icon fas fa-lock"></i>
        <i class="eye-icon fas fa-eye"></i>
        <i class="error error-icon fas fa-exclamation-circle"></i>
      </div>
      <div class="error error-txt">Password can't be blank</div>
    </div>

    <div class="field image">
      <span class="file-wrapper">
        <input type="file" name="image" id="photo" />
        <span class="button">Choose a File</span>
        <div class="error error-txt">Password can't be blank</div>
      </span>

      <img src="/assets/images/default.png" />

    </div>

    <input type="submit" value="Continue to Chat" />
  </form>
  <div class="sign-txt">Already signed up? <a href="/">Login now</a></div>
</div>


<?= $this->endSection() ?>