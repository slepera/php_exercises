<?php
    $country = $_REQUEST['country'];

    require('db_connect.php');

    //$sql = "select city.name, city.population from city join country on city.countrycode = country.code
    //        where country.name = '$country'";

    $sql = "call world.city_per_country('$country')";

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
                $tmp['city'] = $row['name'];
                $tmp['population'] = $row['population'];
                array_push($data, $tmp);
            }
        }
        echo json_encode($data);
    }
    
    require('db_disconnect.php');
?>
