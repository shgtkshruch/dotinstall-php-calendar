<?php
  include_once 'calendor.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
  <title>Calendor with PHP</title>
  <link rel="stylesheet" href="style.css" media="all">
</head>
<body>
  <table>
    <thead>
      <tr>
        <th><a href="">&laquo;</a></th>
        <th colspan="5">2013-07</th>
        <th><a href="">&raquo;</a></th>
      </tr>
      <tr>
       <th>日</th>
       <th>月</th>
       <th>火</th>
       <th>水</th>
       <th>木</th>
       <th>金</th>
       <th>土</th>
      </tr>
    </thead>
    <tbody>

      <?php
        foreach ($weeks as $week) {
          echo $week;
        }
      ?>

    </tbody>
  </table>
</body>
</html>
