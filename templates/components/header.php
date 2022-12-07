<header>
    <h1>robin ingold</h1>
    <?php if (isset($_SESSION['username'])): ?>
        <p>Hello, <?= $_SESSION['username'] ?></p>
        <a href="/api/logout.php">Logout</a>
    <?php else: ?>
        <a href="/login">Login</a>
    <?php endif ?>
    <h1>web design & development</h1>
</header>