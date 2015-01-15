<?php
  // timeStamp

  $ym = isset($_GET['ym']) ? $_GET['ym'] : date("Y-m");

  $timeStamp = strtotime($ym . "-01");

  if ($timeStamp === false) {
    $timeStamp = time();
  }

  // 月の最終日
  $lastDay = date("t", $timeStamp);

  // 先月、翌月のリンク
  $prev = date("Y-m", mktime(0, 0, 0, date("m", $timeStamp) - 1, 1, date("Y", $timeStamp)));
  $next = date("Y-m", mktime(0, 0, 0, date("m", $timeStamp) + 1, 1, date("Y", $timeStamp)));

  // １日の曜日
  $weekDay = date("w", mktime(0, 0, 0, date("m", $timeStamp), 1, date("Y", $timeStamp)));

  $weeks = array();
  $week = '';

  // 第一週の空セルをつくる
  $week .= str_repeat('<td></td>', $weekDay);

  // 日付を生成
  for ($day = 1; $day <= $lastDay; $day++, $weekDay++) {
    $week .= sprintf('<td class="weekday-%d">%d</td>', $weekDay % 7, $day);

    if ($weekDay % 7 == 6 OR $day == $lastDay) {
      if ($day == $lastDay) {
        $week .= str_repeat('<td></td>', 6 - ($weekDay % 7));
      }
      $weeks[] = '<tr>' . $week . '</tr>';
      $week = '';
    }
  }
