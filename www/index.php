<?php
require "./Models/CpuModel.php";
$cpu = new CpuModel("cpu_intel");

if (isset($_POST)) {
    if (!empty($_POST["family"]) && !empty($_POST["model"]) && !empty($_POST["frequence"])) {
        $cpu->create($_POST["family"], $_POST["model"], intval($_POST["frequence"]));
    } else {
        echo "Tous les champs sont obligatoires";
    }
}

?>
<!DOCTYPE html>
<html lang="fr-be">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les CPUs en vente</title>
    <link rel="stylesheet" href="./assets/cpus.css">
</head>

<body>
    <header>
        <h1>Les micro-processeurs INTEL en vente</h1>
    </header>
    <main>
        <h2>Ajouter un nouveau micro-processeur</h2>
        <form action="" method="POST">
            <fieldset>
                <div>
                    <label for="family">Famille</label>
                    <input type="text" name="family" id="family">
                </div>
                <div>
                    <label for="model">Modèle</label>
                    <input type="text" name="model" id="model">
                </div>
                <div>
                    <label for="frequence">Fréquence de base</label>
                    <input type="text" name="frequence" id="frequence">
                </div>

                <input type="submit" value="Valide">
            </fieldset>
        </form>
        <h2>Liste des micro-processeurs disponibles</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Famille</th>
                    <th>Modèle</th>
                    <th>Fréquence de base</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cpu->getCPU() as $key => $value) : ?>
                    <tr>
                        <td> <?= $value->cpu_id ?></td>
                        <td> <?= $value->cpu_family ?></td>
                        <td> <?= $value->cpu_model ?></td>
                        <td> <?= $value->cpu_mhz ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </main>

</body>

</html>