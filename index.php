<?php

define('RAILINGLENGTH', 1500);
define('POSTWIDTH', 10);

define('POSTNUM', 34);
define('RAILSNUM', 12);

define('GIVENLENGTH', 3100);

$length = GIVENLENGTH;
$rails = RAILSNUM;
$posts = POSTNUM;

function calcRailsPosts(int $length) {
    $minLength = (POSTWIDTH * 2) + RAILINGLENGTH;

    if ($length < $minLength) {
            echo 'Your length is not long enough to build a fence!';
    } else {
        $fenceLength = 0;
        $subsLength = POSTWIDTH + RAILINGLENGTH;
        $postVar = 0;
        $railVar = 0;

        echo "|===|";
        $fenceLength += $minLength;
        $postVar += 2;
        $railVar++;

        while (($length - $fenceLength) > 0) {
            echo "===|";
            $fenceLength += $subsLength;
            $postVar++;
            $railVar++;
        }

        echo '<br><br>For your specified distance, ' . round($length/1000, 2) . 'm, the minimum fence length is ' . round($fenceLength/1000, 2) . 'm.<br><br>';
        echo 'You used ' . $railVar . ' railing(s) and ' . $postVar . ' post(s) to build this fence.<br><br>';
        }
}

function calcDistance(int $rails, int $posts) {
    $minPosts = 2;
    $minRails = 1;

    if (($rails < 1) || ($posts < 2) || (($minPosts * POSTWIDTH) + ($minRails * RAILINGLENGTH)) > ((POSTWIDTH * 2) + RAILINGLENGTH)) {
        echo 'You do not have minimum number of railings (1) and posts (2) required to build a fence!';
        }   else {
            $postCount = $posts - 2;
            $railsCount = $rails - 1;
            $subsUnit = POSTWIDTH + RAILINGLENGTH;
            $distance = ($minPosts * POSTWIDTH) + ($minRails * RAILINGLENGTH);

            while (($postCount != 0) && ($railsCount != 0) && ($postCount + $railsCount) >= 2) {
                $distance += $subsUnit;
                $postCount--;
                $railsCount--;
        }
            echo '<br><br>You have used ' . ($rails - $railsCount) . ' railings(s) and ' . ($posts - $postCount) . ' post(s) to build a fence that is ' . round($distance/1000, 2) . 'm long.';
            echo '<br><br>You have ' . $railsCount . ' railings(s) and ' . $postCount . ' post(s) left over.';
    }
}

if (isset($length)) {
    calcRailsPosts($length);
}

if (isset($rails, $posts)) {
    calcDistance($rails, $posts);
}


//note some things to improve: pass the constants to the functions via parameters, also have the functions return and print with another function.