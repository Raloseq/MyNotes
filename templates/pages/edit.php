<section>
    <h2>Edit note</h2>
    <?php $note = $params['note'] ?>
    <form class="note-form" action="/?action=edit" method="post">
        <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
        <ul>
            <li>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="field-long" required value="<?php echo $note['title']?>">
            </li>
            <li>
                <label for="description">Description</label>
                <textarea type="text" name="description" id="description" class="field-long field-textarea"><?php echo $note['description']?></textarea>
            </li>
            <li>
                <input type="submit" value="submit">
            </li>
        </ul>
    </form>
</section>
