<?php include "views/partials/head.php"; ?>
<?php include "views/partials/nav.php"; ?>
<?php include "views/partials/banner.php"; ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-4">
            <a href="/notes" class="text-2xl text-blue-500 hover:underline">Go back to Notes</a>
        </p>
        <ul>
            <li>
                <?= $note['body'] ?>
            </li>
        </ul>
    </div>
</main>
<?php include "views/partials/footer.php"; ?>