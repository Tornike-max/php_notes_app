<?php require __DIR__ . '/../templates/htmlHeader.php'  ?>
<?php require __DIR__ . '/../templates/nav.php'  ?>
<?php require __DIR__ . '/../templates/header.php'  ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="post" action="/session/attempt">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Login user</h2>

                    <div class="w-full m-auto flex justiify-center items-center flex-col mt-10 gap-x-6 gap-y-86">
                        <div class="w-full">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input value="<?= $_POST['email'] ?? '' ?>" type="text" name="email" id="email" class="block flex-1 border-0 bg-transparent py-2 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" />
                                </div>
                                <?php if (isset($errors['email'])) : ?>
                                    <span class="text-red-500 text-sm"><?= $errors['email']['message'] ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="w-full">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="password" name="password" id="password" class="block flex-1 border-0 bg-transparent py-2 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" />
                                </div>
                                <?php if (isset($errors['password'])) : ?>
                                    <span class="text-red-500 text-sm"><?= $errors['password']['message'] ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
            </div>
        </form>
    </div>
</main>

<?php require __DIR__ . '/../templates/htmlFooter.php'  ?>