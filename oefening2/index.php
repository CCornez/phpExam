<?php
require_once './includes/functions.inc.php';

/**
 * sort
 */

// default values
$sort = 'name';
$sortBy = 'ASC';

// array of the possible sort names and sort by
$sorts = ["name", "category", "views"];
$sortBys = [
    'ASC',
    'DESC'
];

// check if sort and sort by parameters exist
// also check if they are in the array of possible sort names and sort by
if (
    isset($_GET["sort"]) &&
    in_array($_GET['sort'], $sorts) &&
    isset($_GET["sortBy"]) &&
    in_array($_GET['sortBy'], $sortBys)
) {
    // if all of the above is true, give $sort and $sortBy the parameter as value
    $sort = $_GET["sort"];
    $sortBy = $_GET["sortBy"];
};

/**
 * filter
 */

// check if category parameter does not exists or if it has a falsy value
if (!isset($_POST["category"]) || !$_POST["category"]) {
    // if one of them is true, don't sent category to the function
    $soorten = getSoorten($sort, $sortBy);
} else {
    // else give category to filter
    $soorten = getSoorten($sort, $sortBy, $_POST["category"]);
}

/**
 * categories
 */

// get an array of all the categories from the database
$categories = getCategories();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soorten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Soorten</h1>
    <form method='post' action=".">
        <select name="category">
            <option value="">-- Select category --</option>

            <!-- create options for each category -->
            <?php foreach ($categories as $category) {
                // default value of $selected is false
                $selected = false;

                // check if category filter exists and if it is this category
                if (isset($_POST["category"]) && $_POST["category"] == $category) {
                    // change the $selected variable to true if both of the above are true
                    $selected = true;
                } ?>

                <!-- make option selected if variable $selected is true -->
                <option value="<?= $category ?>" <?= $selected ? "selected" : "" ?>><?= $category ?></option>

            <?php } ?>

        </select>
        <button type="submit">filter</button>
    </form>
    <table>
        <tr>
            <th>Name
                <!-- href link sortby is going to check if it is already sorted on this column, if so reverse sortby -->
                <a href="./index.php?sort=name&sortBy=<?= $sort == 'name' && $sortBy == 'ASC' ? 'DESC' : 'ASC' ?>">sort</a>
            </th>
            <th>Category
                <a href="./index.php?sort=category&sortBy=<?= $sort == 'category' && $sortBy == 'ASC' ? 'DESC' : 'ASC' ?>">sort</a>
            </th>
            <th>Views
                <a href="./index.php?sort=views&sortBy=<?= $sort == 'views' && $sortBy == 'DESC' ? 'ASC' : 'DESC' ?>">sort</a>
            </th>
        </tr>

        <!-- create row for each $soort -->
        <?php foreach ($soorten as $soort) { ?>

            <tr>
                <td>
                    <a href="./detail.php?id=<?= $soort->id ?>"><?= $soort->name ?></a>
                </td>
                <td><?= $soort->category ?></td>
                <td><?= $soort->views ?></td>
            </tr>

        <?php } ?>

    </table>

</body>

</html>

<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>