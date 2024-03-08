
<?php

function citta_per_paese()
{
    require('db_connect.php');

    $paese = readline("Inserisci il paese: ");
    $sql = "select city.Name, city.Population from city join country on city.CountryCode = country.Code where country.Name = '$paese' order by city.Population DESC";
    $result = $conn->query($sql);
    if($result===false)
    {
        print "errore durante la qury";
    }
    else
	{
		if ($result->num_rows > 0) 
        {
			while($row = $result->fetch_assoc()) {
                print "Città ".$row['Name']." Popolazione ".$row['Population']."\n";
            }
        }
    }
    require('db_disconnect.php');
}

function paesi_per_lingua()
{
    require('db_connect.php');

    $lang = readline("Inserisci la lingua: ");

    $sql = "select country.name from country join countrylanguage on countrylanguage.countrycode = country.code where language = '$lang'";

    $result = $conn->query($sql);

    if($result === false)
    {
        print("errore durante l'esecuzione della query");
    }
    else
    {
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                print "Paese: ".$row['name']."\n";
            }
        }
    }
    require('db_disconnect.php');
}

function paesi_con_abitanti()
{
    require('db_connect.php');

    $pop = readline("Inserisci numero minimo abitanti: ");

    $sql = "select name, population from country where population > $pop";

    $result = $conn->query($sql);

    if($result===false)
    {
        print "errore durante l'esecuzione della qury";
    }
    else
    {
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                print "Paese:".$row['name']." Popolazione ".$row['population']."\n";
            }
        }
    }
    
    require('db_disconnect.php');


}


do{
    $scelta = readline("inserisci\n 1) per elencare le città di un dato paese:\n 2) per sapere i paesi in cui si parla una data lingua:\n 3) per conoscere i paesi con più abitanti di un dato numero:\n 4) per uscire\n");
    
    switch($scelta)
    {
        case 1:
            citta_per_paese();
            break;
        case 2:
            paesi_per_lingua();
            break;
        case 3:
            paesi_con_abitanti();
            break;
        default:
            break;
    }
}while($scelta!=4);

?>
