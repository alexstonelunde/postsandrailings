<?php

define('RAILINGLENGTH', 1500);
define('POSTWIDTH', 100);

define('POSTNUM', 33);
define('RAILSNUM', 12);

define('GIVENLENGTH', 2134);

$length = GIVENLENGTH;
$rails = RAILSNUM;
$posts = POSTNUM;

function calcRailsPosts(int $length, int $railingLength, int $postWidth) {
    $minLength = ($postWidth * 2) + $railingLength;

    if ($length < $minLength) {
            echo 'Your length is not long enough to build a fence!';
    } else {
        $fenceLength = 0;
        $subsLength = $postWidth + $railingLength;
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
    }
    return $calcRailsPostsData = array('fenceLength' => $fenceLength, 'givenLength' => $length, 'rails' => $railVar, 'posts' => $postVar);
}

function calcDistance(int $rails, int $posts, int $postWidth, int $railingLength) {
    $minPosts = 2;
    $minRails = 1;

    if (($rails < 1) || ($posts < 2) || (($minPosts * $postWidth) + ($minRails * $railingLength)) > (($postWidth * 2) + $railingLength)) {
        echo 'You do not have minimum number of railings (1) and posts (2) required to build a fence!';
        }   else {
            $postCount = $posts - 2;
            $railsCount = $rails - 1;
            $subsUnit = $postWidth + $railingLength;
            $distance = ($minPosts * $postWidth) + ($minRails * $railingLength);

            while (($postCount != 0) && ($railsCount != 0) && ($postCount + $railsCount) >= 2) {
                $distance += $subsUnit;
                $postCount--;
                $railsCount--;
        }
    }
    return $calcDistancesData = array('fenceLength' => $distance, 'rails' => $rails, 'posts' => $posts, 'railsLeft' => $railsCount, 'postsLeft' => $postCount);
}

function printResultPosts(array $calcRailsPostsData)
{
    echo '<br><br>For your specified distance, ' . round($calcRailsPostsData['givenLength'] / 1000, 2) . 'm, the minimum fence length is ' . round($calcRailsPostsData['fenceLength'] / 1000, 2) . 'm.<br><br>';
    echo 'You used ' . $calcRailsPostsData['rails'] . ' railing(s) and ' . $calcRailsPostsData['posts'] . ' post(s) to build this fence.<br><br>';
}

function printResultDistance(array $calcDistancesData)
{
    echo '<br><br>You have used ' . ($calcDistancesData['rails'] - $calcDistancesData['railsLeft']) . ' railings(s) and ' . ($calcDistancesData['posts'] - $calcDistancesData['postsLeft']) . ' post(s) to build a fence that is ' . round($calcDistancesData['fenceLength'] / 1000, 2) . 'm long.';
    echo '<br><br>You have ' . $calcDistancesData['railsLeft'] . ' railings(s) and ' . $calcDistancesData['postsLeft'] . ' post(s) left over.';
}

if (isset($length)) {
    $calcRailsPostsData = calcRailsPosts(GIVENLENGTH, RAILINGLENGTH, POSTWIDTH );
    printResultPosts($calcRailsPostsData);
    }

if (isset($rails, $posts)) {
    $calcDistancesData = calcDistance(RAILSNUM, POSTNUM, POSTWIDTH, RAILINGLENGTH);
    printResultDistance($calcDistancesData);
}
