<?php require __DIR__ . '/../templates/htmlHeader.php'  ?>
<?php require __DIR__ . '/../templates/nav.php'  ?>
<?php require __DIR__ . '/../templates/header.php'  ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <table class="w-full">
            <thead class="w-full bg-gray-100">
                <tr class="w-full text-lg">
                    <th class="text-start px-2">Id</th>
                    <th class="text-start px-2">Body</th>
                    <th class="text-start px-2">User</th>
                    <th class="text-start px-2">Actions</th>
                </tr>
            </thead>
            <tbody class="w-full">
                <?php foreach ($data as $note): ?>
                    <tr class="bg-gray-200 border-b border-gray-500">
                        <td class="py-2 px-2"><?= $note['id']; ?></td>
                        <td class="py-2 px-2"><?= $note['body']; ?></td>
                        <td class="py-2 px-2"><?= $note['user_id']; ?></td>
                        <td class="py-2 px-2">
                            <a href="/edit?id=<?= $note['id'] ?>" class="py-2 px-3 rounded-md bg-indigo-500 hover:bg-indigo-600 text-white duration-150 transition-all">Edit</a>
                            <button class="py-2 px-3 rounded-md bg-red-500 hover:bg-red-600 text-white duration-150 transition-all">Delete</button>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>


<?php require __DIR__ . '/../templates/htmlFooter.php'  ?>