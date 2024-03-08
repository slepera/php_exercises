
<?php

function aggiungi_voto()
{
    global $materie_voti;
    $materia = readline("Inserisci la materia: ");
    $voto = readline("Inserisci il voto: ");
    $materie_voti[$materia]=$voto;

}

function trova_voto()
{
    global $materie_voti;
    $materia = readline("Inserisci la materia: ");
    print $materie_voti[$materia];
    


function salva_su_file()
{
    global $materie_voti;
    $data = json_encode($materie_voti);
    file_put_contents("materie_voto.json", $data);
}

$materie_voti=[];

do{
    
    $scelta = readline("inserisci\n 1 per un nuovo inserimento\n 2 per sapere il voto di una materia\n 3 per salvare su file\n 4 per uscire\n");
    if($scelta == 1)
    {
        aggiungi_voto();
    }
    else if($scelta == 2)
    {
        trova_voto();
    }
    else if($scelta ==3)
    {
        salva_su_file();
    }
}while($scelta!=4);

?>
