<?php include base_path("views/partials/head.php"); ?>
<?php include base_path("views/partials/nav.php"); ?>
<?php include base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="post" action="/note">

            <input type="hidden" value="PATCH" name="_method">
            <input type="hidden" value="<?= $note['id'] ?>" name="id">

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">

                    <div class="col-span-full">
                        <label for="body" class="block text-sm/6 font-medium text-gray-900">Body</label>
                        <div class="mt-2">
                            <textarea id="body" name="body" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"><?= $note['body'] ?? '' ?></textarea>
                            <?php if (isset($errors['body'])) : ?>
                                <p class="mt-2 text-sm text-red-600"><?= htmlspecialchars($errors['body']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="/notes" text-sm/6 font-semibold text-gray-900">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                    </div>
        </form>

        <form method="POST" action="/note" class="mt-6">
            <input type="hidden" value="DELETE" name="_method">
            <input type="hidden" value="<?= $note['id'] ?>" name="id">
            <button type="submit" class="text-sm text-red-500">Delete</button>
        </form>

    </div>
</main>
<?php include base_path("views/partials/footer.php"); ?>