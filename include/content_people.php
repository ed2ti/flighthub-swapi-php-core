<?php
/* Geting Data */
if (!empty($_REQUEST['page'])) {
    $page   = $_REQUEST['page'];
} else {
    $page   = 1;
}
$url    = 'https://swapi.dev/api/people/?page=' . $page;
$json   = file_get_contents($url);
$people = json_decode($json);
$total  = $people->count;
$pages  = intval(($total / 10) + 1);
?>
<div class="row">
    <div class="col-sm-6">
        <h2>People <b>Details</b></h2>
    </div>
    <div class="col-sm-6">
        <div class="search-box">
            <div class="input-group">
                <input type="text" id="search" class="form-control" placeholder="Search by Name">
                <button>teste</button>
            </div>
        </div>
    </div>
</div>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Height</th>
            <th scope="col">Mass</th>
            <th scope="col">Hair Color</th>
            <th scope="col">Skin Color</th>
            <th scope="col">Eye Color</th>
            <th scope="col">Birth Year</th>
            <th scope="col">Gender</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($people->results as $key => $value) {
            echo '<tr>';
            echo '<td>' . $value->name . '</td>';
            echo '<td>' . $value->height . '</td>';
            echo '<td>' . $value->mass . '</td>';
            echo '<td>' . $value->hair_color . '</td>';
            echo '<td>' . $value->skin_color . '</td>';
            echo '<td>' . $value->eye_color . '</td>';
            echo '<td>' . $value->birth_year . '</td>';
            echo '<td>' . $value->gender . '</td>';
        }
        ?>
    </tbody>
</table>

<nav aria-label="...">
    <ul class="pagination">
        <?php
        if ($page == 1) {
            echo '
                <li class="page-item disabled">
                <span class="page-link">Previous</span>
                </li>
                ';
        } else {
            echo '
                <li class="page-item">
                <a class="page-link" href="index.php?call=people&page=' . ($page - 1) . '"> Previous </a>
                </li>
                ';
        }
        for ($i = 1; $i <= $pages; $i++) {
            if ($i == $page) {
                $active = 'active';
            } else {
                $active = '';
            }
            echo '
            <li class="page-item ' . $active . '"><a class="page-link" href="index.php?call=people&page=' . $i . '"> ' . $i . '</a></li>
            ';
        }
        if ($page == $pages) {
            echo '
                <li class="page-item disabled">
                <span class="page-link">Next</span>
                </li>
                ';
        } else {
            echo '
                <li class="page-item">
                <a class="page-link" href="index.php?call=people&page=' . ($page + 1) . '"> Next </a>
                </li>
                ';
        }
        ?>
    </ul>
</nav>