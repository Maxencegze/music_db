<?php
require_once '../functions/db_connect.php';
require_once '../components/header.php';
require_once '../Controllers/ArtistsController.php';

use Controllers\ArtistsController;

$artistsController = new ArtistsController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['store'])) {
    $toto = $_POST['name'];
    $artistsController->store($toto);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $name = $_POST['name'];
    $id = $_GET['id'];
    $artistsController->update($name, $id);
}

if (isset($_GET['id'])) {
    $artist = $artistsController->show($_GET['id']);
    var_dump($artist);
}



?>

<div class="flex-grow flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <form method="POST">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom de l'artiste:</label>
                <input type="text" id="name" name="name" required value="<?= $artist->name ?? '' ?>"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200 ease-in-out"
                <?php if (isset($_GET["id"])) { ?> name="update" <?php } else { ?> name="store" <?php } ?>>
                <?php if (isset($_GET["id"])) { ?> Modifier <?php } else { ?> Ajouter <?php } ?>
            </button>
        </form>
    </div>
</div>

<?php
require_once '../components/footer.php';
?>