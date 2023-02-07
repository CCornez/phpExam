<?php
require_once './includes/db.inc.php';

/*-----------------------------------------soorten-----------------------------------------*/

/**
 * GET
 */

function getSoorten($sort, $sortBy, $category = "%")
{
    $sql = "
    SELECT
        *
    FROM
        230130_soorten
    WHERE 
        category
    LIKE
        :category
    ORDER BY
        $sort $sortBy
    ";

    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":category", $category);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
    $conn = null;
};

function getSoort($id)
{
    $sql = "
    SELECT
        *
    FROM
        230130_soorten
    WHERE 
        id = :id
    ";

    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
    $conn = null;
}


function getCategories()
{

    $sql = "
    SELECT DISTINCT
        category
    FROM
        230130_soorten 
    ORDER BY
        category ASC
    ";

    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $result;
    $conn = null;
}

/**
 * PATCH
 */


function patchSoort($id)
{
    $sql = "
    UPDATE
        230130_soorten
    SET
        views = views + 1
    WHERE
        id = :id
    ";

    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}


/*-----------------------------------------api-----------------------------------------*/

function getApi($url)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = json_decode(curl_exec($curl));
    if (!$response) {
        return array();
    }

    curl_close($curl);
    return $response;
}
