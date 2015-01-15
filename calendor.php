<?php
  // 今月のカレンダー

  $timeStamp = time();

  // 月の最終日
  $lastDay = date("t", $timeStamp);

  // １日の曜日
  $weekDay = date("w", mktime(0, 0, 0, date("m", $timeStamp), 1, date("Y", $timeStamp)));
  echo $timeStamp;
