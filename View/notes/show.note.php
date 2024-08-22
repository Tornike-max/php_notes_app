<?php require __DIR__ . '/../templates/htmlHeader.php'  ?>
<?php require __DIR__ . '/../templates/nav.php'  ?>
<?php require __DIR__ . '/../templates/header.php'  ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl text-gray-800 font-semibold"><?= $note['body'] ?> - <?= $note['name'] ?></h1>
        <h3><?= $note['email'] ?></h3>
        <form method="POST" action="/delete?id=<?= $note['id'] ?>">
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="py-2 px-3 rounded-md bg-red-500 hover:bg-red-600 text-white duration-150 transition-all">Delete</button>
        </form>
    </div>
</main>