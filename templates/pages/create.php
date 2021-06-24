<section>
    <h2>New note</h2>
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
    </div>
</section>
