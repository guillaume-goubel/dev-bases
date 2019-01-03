<?php

$infosArray= [

    0 =>[
        'nom' => 'Julien',
        'adresse' => '6 rue des champs. 59510 Hem.',
        'telephone' => '0654785696',
    ],

    1 =>[
        'nom' => 'Toto',
        'adresse' => '78 rue du Gland. 59000 Lille.',
        'telephone' => '0654785789',
    ],

    2 =>[
        'nom' => 'André',
        'adresse' => '115 rue de Wazemmes. 59000 Lille.',
        'telephone' => '0354785603',
    ],

    3 =>[
        'nom' => 'Stan',
        'adresse' => '6 rue des champs. 59510 Lille.',
        'telephone' => '0778235645',
    ]

];
?>

<pre>

<?php

print_r($infosArray);

?>

</pre>

<?php

$habitantLille = 0;

foreach ($infosArray as $key => $info) {

    $mystring = $info['adresse'];
    $findme   = 'Lille';
    $pos = strpos($mystring, $findme);

    if ($pos !== false) {
        $habitantLille ++;
    } 
}

echo $habitantLille;