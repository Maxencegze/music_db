<!-- Créer un tableau qui affiche l'ID de l'album, son nom ainsi que le nom de l'artiste qui l'a créé ! -->

<?php

$title = "Albums";

require_once "../components/header.php";

// utiliser AlbumsController 

?>

<h1 class="text-3xl underline"><?= $title ?></h1>
<div class="p-4 relative flex flex-col justify-center items-center w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
    <table class="w-2/3 text-left table-auto min-w-max">
        <thead>
            <tr>
                <th class="p-4 border-b border-slate-300 bg-slate-50">
                    <p class="block text-sm font-normal leading-none text-slate-500">
                        ID
                    </p>
                </th>
                <th class="p-4 border-b border-slate-300 bg-slate-50">
                    <p class="block text-sm font-normal leading-none text-slate-500">
                        Title
                    </p>
                </th>
                <th class="p-4 border-b border-slate-300 bg-slate-50">
                    <p class="block text-sm font-normal leading-none text-slate-500">
                        Artist
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
            <?php foreach ($albums as $album) {
            ?>
                <tr class="hover:bg-slate-50">
                    <td class="p-4 border-b border-slate-200">
                        <p class="block text-sm text-slate-800">
                            <?= $album->album_id ?>
                        </p>
                    </td>
                    <td class="p-4 border-b border-slate-200">
                        <p class="block text-sm text-slate-800">
                            <?= $album->album_name ?>
                        </p>
                    </td>
                    <td class="p-4 border-b border-slate-200">
                        <p class="block text-sm text-slate-800">
                            <?= $album->artist_name ?>
                        </p>
                    </td>
                    <td>
                        <a href="/albums/updateAlbumForm.php?id=<?= $album->album_id ?>" title="Get quote now"
                            class="relative inline-flex items-center justify-center p-2 text-sm font-bold text-white transition-all duration-200 bg-orange-500 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                            role="button">Edit
                        </a>
                    </td>
                    <td>
                        <a href="">Delete</a>
                    </td>
                <?php
            }
                ?>
                </tr>
        </tbody>
    </table>
</div>

<?php
require_once "../components/footer.php";
