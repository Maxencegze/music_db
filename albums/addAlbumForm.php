<?php
require_once '../components/header.php';

?>

<div class="flex-grow flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <form method="POST">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Nom de l'album:</label>
                <input type="text" id="title" name="title" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="mb-4">
                <label for="artist_id" class="block text-sm font-medium text-gray-700 mb-2">Artiste:</label>
                <select name="artist_id" id="artist_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Sélectionnez un artiste</option>
                    <?php
                    foreach ($artists as $artist) {
                    ?>
                        <option value=<?= $artist->id ?>><?= $artist->name ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200 ease-in-out">
                Ajouter
            </button>
        </form>
    </div>
</div>

<?php
require_once '../components/footer.php';
?>