<?php
require_once "dbc.php";

try{
    $sql = "SELECT * FROM rps     
    WHERE winer='player'    
    ORDER BY win DESC, games DESC
    LIMIT 5";

    $result = $pdo->query($sql);
    
    if($result->rowCount() > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Nickname</th>";
                echo "<th>Rounds</th>";
                echo "<th>Win</th>";
                echo "<th>Games</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
            echo "<td>" . $row['nickname'] . "</td>";
            echo "<td>" . $row['rounds'] . "</td>";
            echo "<td>" . $row['win'] . "</td>";
            echo "<td>" . $row['games'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}