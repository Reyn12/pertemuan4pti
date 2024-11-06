<!DOCTYPE html>
<html>

<head>
    <title>PT. Ujung Berung | Login</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Login CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/login.css'); ?>">

    <!-- Load CSS tambahan -->
    <?php include 'inc/head.php'; ?>
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <form method="POST" class="form-signin text-center" action="<?= site_url('login'); ?>">
                    <h2 class="form-signin-heading mb-4">PT. Ujung Berung</h2>
                    <?php if (isset($login_info)) : ?>
                        <div class="alert alert-danger"><?= $login_info ?></div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="username" class="sr-only">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Load JavaScript tambahan -->
    <?php include 'inc/jq.php'; ?>
</body>

</html>