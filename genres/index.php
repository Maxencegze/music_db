<?php

require_once "../components/header.php";

require_once "..//Controllers/GenresController.php";

use Controllers\GenresController;

$genresController = new GenresController();
$genres = $genresController->index();



?>
<div class="flex items-center justify-between p-4">
    <h1 class="text-3xl underline">Genre</h1>
    <a class="relative inline-flex items-center justify-center p-2 text-sm font-bold text-white transition-all duration-200 bg-blue-500 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
        href="./genres/addArtistForm.php">Add Genre</a>
</div>
<div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
    <table class="w-full text-left table-auto min-w-max">
        <thead>
            <tr>
                <th class="p-4 border-b border-slate-300 bg-slate-50">
                    <p class="block text-sm font-normal leading-none text-slate-500">
                        ID
                    </p>
                </th>
                <th class="p-4 border-b border-slate-300 bg-slate-50">
                    <p class="block text-sm font-normal leading-none text-slate-500">
                        Name
                    </p>
                </th>
                <th class="p-4 border-b border-slate-300 bg-slate-50">
                    Actions
                </th>
                <th class="p-4 border-b border-slate-300 bg-slate-50">
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($genres as $genre) {
            ?>
                <tr class="hover:bg-slate-50">
                    <td class="p-4 border-b border-slate-200">
                        <p class="block text-sm text-slate-800">
                            <?= $genre->id ?>
                        </p>
                    </td>
                    <td class="p-4 border-b border-slate-200">
                        <p class="block text-sm text-slate-800">
                            <?= $genre->name ?>
                        </p>
                    </td>
                    <td>
                        <a href="artists/updateArtistForm.php?id=<?= $genre->id ?>" title="Update Artist"
                            class="relative inline-flex items-center justify-center p-2 text-sm font-bold text-white transition-all duration-200 bg-orange-500 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                            role="button">Edit
                        </a>
                    </td>
                    <td>
                        <?php if ($genre->deleted_at == null) { ?>
                            <form method="post">
                                <input type="hidden" name="artist_id" value="<?= $genre->id ?>">
                                <input type="submit" name="delete" value="Delete"
                                    class="relative inline-flex items-center justify-center p-2 text-sm font-bold text-white transition-all duration-200 bg-red-500 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                                    role="button">
                            </form>
                        <?php } else { ?>
                            <form method="post">
                                <input type="hidden" name="artist_id" value="<?= $genre->id ?>">
                                <input type="submit" name="restore" value="Restore"
                                    class="relative inline-flex items-center justify-center p-2 text-sm font-bold text-white transition-all duration-200 bg-green-500 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                                    role="button">
                            </form>
                        <?php } ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
</body>

</html>

<?php

require_once "../components/footer.php";
