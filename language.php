<?php

    require('db_connect.php');

    //$sql = "SELECT language, count(*) as number_of_countries from countrylanguage group by language having number_of_countries >= 10 order by number_of_countries desc;";
    $sql = "call world.most_spoken_languages();";

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
                $tmp['language'] = $row['language'];
                $tmp['number_of_countries'] = $row['number_of_countries'];
                array_push($data, $tmp);
            }
        }
        echo json_encode($data);
    }
    
    require('db_disconnect.php');
?>
