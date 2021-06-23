<section>
    <h2>New note</h2>
    <?php if($params['created']):?>
    <div>
        <p>Title: <?php echo $params['title'] ?></p>
        <p>Description: <?php echo $params['description'] ?></p>
    </div>
    <?php else: ?>
        <form class="note-form" action="/?action=create" method="post">
            <ul>
                <li>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="field-long" required>
                </li>
                <li>
                    <label for="description">Description</label>
                    <textarea type="text" name="description" id="description" class="field-long field-textarea"></textarea>
                </li>
                <li>
                    <input type="submit" value="submit">
                </li>
            </ul>
        </form>
    <?php endif;?>
    </div>
</section>
