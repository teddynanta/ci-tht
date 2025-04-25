<!DOCTYPE html>
<html>

<head>
  <title>Register</title>
</head>

<body>
  <h2>Register</h2>

  <?php if (session()->getFlashdata('error')): ?>
    <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
  <?php endif; ?>

  <form action="/register" method="post">
    <?= csrf_field() ?>

    <label>First Name:</label>
    <input type="text" name="first_name" required><br><br>

    <label>Last Name:</label>
    <input type="text" name="last_name" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Register</button>
  </form>

  <p>Already have an account? <a href="/login">Login here</a></p>
</body>

</html>