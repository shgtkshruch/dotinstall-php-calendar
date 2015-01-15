<?php

  class Calendar {
    protected $weeks = array();
    protected $timeStamp;

    public function __construct ($ym) {
      $this->timeStamp = strtotime($ym . "-01");

      if ($this->timeStamp === false) {
        $this->timeStamp = time();
      }
    }

    public function create () {
      $week = '';

      // 月の最終日
      $lastDay = date("t", $this->timeStamp);

      // １日の曜日
      $weekDay = date("w", mktime(0, 0, 0, date("m", $this->timeStamp), 1, date("Y", $this->timeStamp)));

      // 第一週の空セルをつくる
      $week .= str_repeat('<td></td>', $weekDay);

      // 日付を生成
      for ($day = 1; $day <= $lastDay; $day++, $weekDay++) {
        $week .= sprintf('<td class="weekday-%d">%d</td>', $weekDay % 7, $day);

        if ($weekDay % 7 == 6 OR $day == $lastDay) {
          if ($day == $lastDay) {
            $week .= str_repeat('<td></td>', 6 - ($weekDay % 7));
          }
          $this->weeks[] = '<tr>' . $week . '</tr>';
          $week = '';
        }
      }
    }


    public function getWeeks () {
      return $this->weeks;
    }

    public function prev () {
     return date("Y-m", mktime(0, 0, 0, date("m", $this->timeStamp) - 1, 1, date("Y", $this->timeStamp)));
    }

    public function next () {
      return date("Y-m", mktime(0, 0, 0, date("m", $this->timeStamp) + 1, 1, date("Y", $this->timeStamp)));
    }

    public function yearMonth () {
      return date("Y-m", $this->timeStamp);
    }
  }

