<?php

    require('db_connect.php');

    $sql = "select name, population from country order by population desc limit 20";

    $result = $conn->query($sql);

    if($result===false)
    {
        print "errore durante l'esecuzione della qury";
    }
    else
    {
        $data = [];
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                $tmp['country'] = $row['name'];
                $tmp['population'] = $row['population'];
                array_push($data, $tmp);
            }
        }
        echo json_encode($data);
    }
    
    require('db_disconnect.php');
?>
