<?php 
 $query = $_GET['query'].'%'; // add % for LIKE query later

// do query
$stmt = $dbh->prepare('SELECT * FROM frecuendias WHERE 1 LIKE = saac');
$stmt->bindParam(':query', $query, PDO::PARAM_STR);
$stmt->execute();

// populate results
$results = array();
foreach ($stmt->fetchAll(PDO::FETCH_COLUMN) as $row) {
    $results[] = $row;
}

// and return to typeahead
return json_encode($results);
?>
