<?php require __DIR__ . '/../templates/htmlHeader.php'  ?>
<?php require __DIR__ . '/../templates/nav.php'  ?>
<?php require __DIR__ . '/../templates/header.php'  ?>

<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="my-4">
        <a href="/create" class="py-2 px-3 rounded-lg bg-blue-500 hover:bg-blue-600 duration-150 transition-all text-white">Create</a>
    </div>
    <table class="w-full">
        <thead class="w-full bg-gray-100">
            <tr class="w-full text-lg">
                <th class="text-start px-2">Id</th>
                <th class="text-start px-2">Name</th>
                <th class="text-start px-2">Email</th>
                <th class="text-start px-2">Actions</th>
            </tr>
        </thead>
        <tbody class="w-full">
            <?php foreach ($users as $user): ?>
                <tr class="bg-gray-200 border-b border-gray-500">
                    <td class="py-2 px-2"><?= $user['id']; ?></td>
                    <td class="py-2 px-2"><?= $user['name']; ?></td>
                    <td class="py-2 px-2"><?= $user['email']; ?></td>
                    <td class="py-2 px-2 flex items-center gap-2">
                        <a href="/show?id=<?= $user['id'] ?>" class="py-2 px-3 rounded-md bg-indigo-500 hover:bg-indigo-600 text-white duration-150 transition-all">Show</a>
                        <a href="/edit?id=<?= $user['id'] ?>" class="py-2 px-3 rounded-md bg-indigo-500 hover:bg-indigo-600 text-white duration-150 transition-all">Edit</a>
                        <form method="POST" action="/delete?id=<?= $user['id'] ?>">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="py-2 px-3 rounded-md bg-red-500 hover:bg-red-600 text-white duration-150 transition-all">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require __DIR__ . '/../templates/htmlFooter.php'  ?>