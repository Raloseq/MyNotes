<section>
    <div class="message">
        <?php
            if(!empty($params['before'])) {
                switch ($params['before']) {
                    case 'created':
                        echo "Note created";
                        break;
                }
            }
        ?>
    </div>
    <h2>List of notes</h2>
</section>
