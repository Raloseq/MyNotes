<div class="show">
    <?php $note = $params['note'] ?? null ?>
    <?php if($note) :?>
        <ul>
            <li>Title: <?php echo htmlentities($note['title'])?></li>
            <li>Description <?php echo htmlentities($note['description'])?></li>
            <li>Created at: <?php echo htmlentities($note['created'])?></li>
        </ul>
    <?php else: ?>
        <div>
            U don't have any notes.
        </div>
    <?php endif; ?>
    <a href="/">
        <button>Back to main page</button>
    </a>
</div>