<?php
session_start();
$message = $_SESSION['message'] ?? null;
unset($_SESSION['message']);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription | Mini-LMS</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow" style="width: 100%; max-width: 450px;">
            <div class="card-body p-4">

                <h3 class="text-center mb-4">Créer un compte</h3>
                <?php if (!empty($message)): ?>
                <div class="alert alert-info text-center">
                    <?= $message ?>
                </div>
            <?php endif; ?>
                <form action="registerStore.php" method="POST">

                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d’utilisateur</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        S’inscrire
                    </button>
                </form>

                <div class="text-center mt-3">
                    <small>
                        Déjà un compte ?
                        <a href="login.php">Se connecter</a>
                    </small>
                </div>

            </div>
        </div>
    </div>

</body>

</html>