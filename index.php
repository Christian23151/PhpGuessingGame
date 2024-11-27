<?php
session_start();


if (!isset($_SESSION['number'])) {
    $_SESSION['number'] = rand(1, 100);
}


$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $guess = (int)$_POST['guess'];

    if ($guess > $_SESSION['number']) {
        $message = "Too high!";
    } elseif ($guess < $_SESSION['number']) {
        $message = "Too low!";
    } else {
        $message = "Correct! The number was " . $_SESSION['number'];
        unset($_SESSION['number']); // Reset the game
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guessing Game</title>
</head>
<body>
    <h1>Guess the Number (1-100)</h1>
    <form method="POST">
        <input type="number" name="guess" placeholder="Enter your guess" required>
        <button type="submit">Submit</button>
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>
