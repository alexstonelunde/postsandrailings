<?php

require('functions.php');

define('RAILINGLENGTH', 1500);
define('POSTWIDTH', 100);

define('POSTNUM', 33);
define('RAILSNUM', 12);

define('GIVENLENGTH', 234324);

$length = GIVENLENGTH;
$rails = RAILSNUM;
$posts = POSTNUM;


if (isset($length)) {
    $calcRailsPostsData = calcRailsPosts(GIVENLENGTH, RAILINGLENGTH, POSTWIDTH );
    printResultPosts($calcRailsPostsData);
    }

if (isset($rails, $posts)) {
    $calcDistancesData = calcDistance(RAILSNUM, POSTNUM, POSTWIDTH, RAILINGLENGTH);
    printResultDistance($calcDistancesData);
}
