<div class="show">
    <?php $note = $params['note'] ?? null ?>
    <?php if($note) :?>
        <ul>
            <li>Title: <?php echo $note['title']?></li>
            <li>Description <?php echo $note['description']?></li>
            <li>Created at: <?php echo $note['created']?></li>
        </ul>
        <a href="/?action=edit&id=<?php echo $note['id']?>">
            <button>edit</button>
        </a>
    <?php else: ?>
        <div>
            U don't have any notes.
        </div>
    <?php endif; ?>
    <a href="/">
        <button>Back to main page</button>
    </a>
</div>