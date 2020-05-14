<?php
  $dateString = fgets(fopen('./value.txt', 'r'));

  if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $datetime = new DateTime();
    $dateString = $datetime->format('c');
    file_put_contents('./value.txt', $dateString);
    header("Location: http://tokenburger.com");
    die();
  }

  $date = new DateTime($dateString);
  $now = new DateTime();
  $difference = $date->diff($now);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Token Burger</title>
  <style>
  body {
    background-color: #3b4652;
    padding: 4rem 1rem;
    font-family: sans-serif;
    font-size: 1.5rem;
    color: white;
    text-align: center;
  }
  .count {
    background-color: white;
    color: #3b4652;
    font-weight: 500;
    font-size: 2.5rem;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    display: inline-block;
    margin-right: 1rem;
  }
  .count-row {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  input { 
    padding: 1rem 2rem;
    border-radius: 0.5rem;
    background-color: white;
    font-size: 1.5rem;
    border: none;
    bottom: 0;
    margin-top: 4rem;
    -webkit-appearance: none;
  }
  .times {
    font-size: 1rem;
    opacity: 0.5;
  }
  </style>
</head>
<body>
  <p>It has been<p>
  <p class="count-row"> 
    <span class="count"><?= $difference->days ?></span>
    <span class="day">days</span>
  </p>
  <p>since the token burger pissed someone off</p>
  <div class="times">
    <?= $difference->days ?> days
    <?= $difference->h ?> hours
    <?= $difference->m ?> minutes
    <?= $difference->s ?> seconds
  </div>
  <form method="POST">
    <input type="submit" value="Reset">
  </form>
</body>
</html>
