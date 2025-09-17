<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <!-- Favicon for POS Software -->
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/5087/5087579.png" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    /* Body Styling */
    body {
      font-family: "Open Sans", sans-serif;
      height: 100vh;
      background: url("images/HgflTDf.jpeg") no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }

    /* Dark Overlay */
    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.55);
      z-index: 0;
    }

    /* Login Card */
    .login-card {
      position: relative;
      z-index: 1;
      width: 400px;
      padding: 30px;
      border-radius: 15px;
      backdrop-filter: blur(12px);
      background: rgba(255, 255, 255, 0.12);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
      color: #fff;
    }

    .login-card h3 {
      text-align: center;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .form-control {
      background-color: rgba(255, 255, 255, 0.1);
      color: #fff;
      border: none;
      border-radius: 8px;
    }

    .form-control::placeholder {
      color: #ddd;
    }

    .btn-login {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      font-weight: bold;
      background-color: #0d6efd;
      border: none;
      transition: 0.3s;
    }

    .btn-login:hover {
      background-color: #0b5ed7;
    }

    .social-icons {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 15px;
    }

    .social-icons a {
      font-size: 20px;
      color: #fff;
      transition: 0.3s;
    }

    .social-icons a:hover {
      color: #0d6efd;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h3><i class="fas fa-user-circle"></i> Login</h3>
    <form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-3">
      <input type="email" name="email" class="form-control" placeholder="Email Address" required>
    </div>
    <div class="mb-3">
      <input type="password" name="password" class="form-control" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-login">Login</button>
</form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
