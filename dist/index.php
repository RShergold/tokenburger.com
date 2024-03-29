<?php

  if( 
    $_SERVER['REQUEST_METHOD'] === 'POST' 
    && $_POST['message'] == ''
    && $_POST['abra'] == 'cadabra' ) {
      
    $datetime = new DateTime();
    $dateString = $datetime->format('c');
    file_put_contents('./value.txt', $dateString);
    header('Location: http://tokenburger.com');
    die();
  }

  $dateString = fgets(fopen('./value.txt', 'r'));
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
  <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🍔</text></svg>">
  <style>
  :root {
    --brand-color: #3b4652;
  }
  body {
    background-color: var(--brand-color);
    padding: 4rem 1rem;
    font-family: sans-serif;
    font-size: 1.5rem;
    color: white;
    text-align: center;
  }
  .count {
    background-color: white;
    color: var(--brand-color);
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
    color: var(--brand-color);
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
    <span class="day">
      <?= $difference->days == 1 ? 'day' : 'days' ?>
    </span>
  </p>
  <p>since the token burger pissed someone off</p>
  <div class="times">
    <?= $difference->days ?> days
    <?= $difference->h ?> hours
    <?= $difference->i ?> minutes
    <?= $difference->s ?> seconds
  </div>
  <form method="POST" onformdata="event.formData.append('abra', 'cadabra')">
    <input name="message" style="display:none"/>
    <input type="submit" value="Reset">
  </form>
</body>
</html>
