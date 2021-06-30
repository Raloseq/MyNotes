<div class="list">
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
        <div class="message">
            <?php
            if(!empty($params['error'])) {
                switch ($params['error']) {
                    case 'noteNotFound':
                        echo "Note doeasn't exist";
                        break;
                    case 'missingNoteId':
                        echo "Note with that id doeasn't exist";
                        break;
                }
            }
            ?>
        </div>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Options</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <?php foreach ($params['notes'] ?? [] as $note) :?>
                        <tr>
                            <td><?php echo $note['id']?></td>
                            <td><?php echo $note['title']?></td>
                            <td><?php echo $note['created']?></td>
                            <td>
                                <a href="/?action=show&id=<?php echo $note['id'] ?>">
                                    <button>Details</button></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </section>
</div>
