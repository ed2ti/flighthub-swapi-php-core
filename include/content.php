<?php
 if ($_REQUEST['call']=='people' || $_REQUEST['call']==''){
    @require_once "content_people.php";
 }else if ($_REQUEST['call']=='planets'){
    @require_once "content_planets.php";
 }else if ($_REQUEST['call']=='starships'){
    @require_once "content_starships.php";
 } else{
    echo '<h1 class="mt-4">404 Error - Page Not Found</h1>
    <p> We\'re sorry, the page you are looking for cannot be found. Please check that you have typed the URL correctly or try searching for the page using the search bar above. If you continue to experience issues, please contact our support team for assistance.</p>';
 }
?>

