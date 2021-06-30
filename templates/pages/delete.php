<div class="show">
    <?php $note = $params['note'] ?? null ?>
    <?php if($note) :?>
        <ul>
            <li>Title: <?php echo $note['title']?></li>
            <li>Description <?php echo $note['description']?></li>
            <li>Created at: <?php echo $note['created']?></li>
        </ul>
        <form action="/?action=delete" method="post">
            <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
            <input type="submit" value="Delete">
        </form>
    <?php else: ?>
        <div>
            U don't have any notes.
        </div>
    <?php endif; ?>
    <a href="/">
        <button>Back to main page</button>
    </a>
</div>
