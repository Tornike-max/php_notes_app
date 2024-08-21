<?php require __DIR__ . '/../templates/htmlHeader.php'  ?>
<?php require __DIR__ . '/../templates/nav.php'  ?>
<?php require __DIR__ . '/../templates/header.php'  ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="post" action="/update?id=<?= $note['id'] ?>">
            <input type="hidden" name="_method" value="PUT" />
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Edit note #<?= $note['id'] ?></h2>

                    <div class="w-full m-auto flex justiify-center items-center flex-col mt-10 gap-x-6 gap-y-86">
                        <div class="w-full">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <textarea type="text" name="body" id="body" class="block flex-1 border-0 bg-transparent py-2 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="w-full">
                            <label class="block text-sm font-medium leading-6 text-gray-900">User</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <select name="user_id" id="user_id" class="block flex-1 border-0 bg-transparent py-2 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        <?php foreach ($users as $user): ?>
                                            <option value="<?php $user['id'] ?>"><?= $user['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
</main>