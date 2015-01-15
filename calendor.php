<?php
  // 今月のカレンダー

  $timeStamp = time();

  // 月の最終日
  $lastDay = date("t", $timeStamp);

  // １日の曜日
  $weekDay = date("w", mktime(0, 0, 0, date("m", $timeStamp), 1, date("Y", $timeStamp)));
  echo $timeStamp;

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
