<div class="list">
    <section>
        <div class="message">
            <?php
                if(!empty($params['before'])) {
                    switch ($params['before']) {
                        case 'created':
                            echo "Note created";
                            break;
                        case 'edited':
                            echo 'Note updated';
                            break;
                        case 'deleted':
                            echo 'Note deleted';
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

        <?php
            $sort = $params['sort'] ?? null;
            $by = $sort['by'] ?? 'title';
            $order = $sort['order'] ?? 'desc';
            $page = $params['page'] ?? null;
            $size = $page['size'] ?? 10;
            $currentPage = $page['number'] ?? 1;
            $pages = $page['pages'] ?? 1;
            $phrase = $params['phrase'] ?? null;
        ?>

        <div>
            <form action="/" method="get" class="settings-form">
                <div>
                    <label for="phrase">Search by title: </label>
                    <input type="text" name="phrase" id="phrase" value="<?php echo $phrase?>">
                </div>
                <div>
                    <p>Sort by</p>
                    <label for="title">Title</label>
                    <input type="radio" value="title" id="title" name="sortby" <?php echo $by === 'title' ? 'checked' : '' ?>>
                    <label for="data">Date</label>
                    <input type="radio" name="sortby" id="data" value="created" <?php echo $by === 'created' ? 'checked' : '' ?>>
                </div>
                <div>
                    <p>Sort order</p>
                    <label for="asc">Ascending</label>
                    <input type="radio" name="sortorder" id="asc" value="asc" <?php echo $order === 'asc' ? 'checked' : '' ?>>
                    <label for="desc">Descending</label>
                    <input type="radio" name="sortorder" id="desc" value="desc" <?php echo $order === 'desc' ? 'checked' : '' ?>>
                </div>
                <div>
                    <p>How much notes do u need ?</p>
                    <label for="one">1</label>
                    <input type="radio" name="pagesize" value="1" id="one" <?php $size === 1 ? 'checked' : ''?>>
                    <label for="five">5</label>
                    <input type="radio" name="pagesize" value="5" id="five" <?php $size === 5 ? 'checked' : ''?>>
                    <label for="ten">10</label>
                    <input type="radio" name="pagesize" value="10" id="ten" <?php $size === 10 ? 'checked' : ''?>>
                    <label for="tfive">25</label>
                    <input type="radio" name="pagesize" value="25" id="tfive" <?php $size === 25 ? 'checked' : ''?>>
                </div>
                <input type="submit" value="Send">
            </form>
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
                                    <button>Details</button>
                                </a>
                                <a href="/?action=delete&id=<?php echo $note['id'] ?>">
                                    <button>Delete</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>

        <?php
            $paginationUrl = "&phrase$phrase=&pagesize=$size?sortby=$by&sororder=$order"
        ?>
        <ul class="pagination">
            <?php if($currentPage !== 1):?>
                <li>
                    <a href="/?page=<?php echo $currentPage - 1 . $paginationUrl ?>">
                        <button><<</button>
                    </a>
                </li>
            <?php endif;?>
            <?php for($i = 1; $i <= $pages; $i++):?>
                <li>
                    <a href="/?page=<?php echo $i . $paginationUrl?>">
                        <button><?php echo $i?></button>
                    </a>
                </li>
            <?php endfor;?>
            <?php if($currentPage < $pages):?>
                <li>
                    <a href="/?page=<?php echo $currentPage + 1 . $paginationUrl?>">
                        <button>>></button>
                    </a>
                </li>
            <?php endif;?>
        </ul>
    </section>
</div>
