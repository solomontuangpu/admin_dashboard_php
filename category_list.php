    <table class="table table-hover table-striped mt-3 mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>User_id</th>
                <th>Control</th>
                <th>Created_at</th>
            </tr>
        </thead>

        <tbody>
            <?php 

                foreach(categories() as $c) {
                
            ?>

                    <tr class="<?php echo $c['ordering'] == 1 ? 'table-info' : ''; ?>">
                        <td><?php echo $c['id']; ?></td>
                        <td><?php echo $c['title']; ?></td>
                        <td><?php echo user($c['user_id'])['name']; ?></td>
                        <td>
                            <a href="category_delete.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete?')">
                                <i class="feather-trash-2"></i>
                            </a>

                            <a href="category_update.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-info btn-sm">
                                <i class="feather-edit"></i>
                            </a>

                            <?php if($c['ordering'] != 1) { ?>

                                <a href="category_pin_top.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-info btn-sm">
                                    <i class="feather feather-tag"></i>
                                </a>

                            <?php } else { ?>

                                <a href="category_pin_remove.php" class="btn btn-outline-info btn-sm">
                                    <i class="feather feather-tag"></i>
                                </a>

                            <?php } ?>
                        </td>
                        <td><?php echo showTime($c['created_at'], 'M d,Y'); ?></td>
                    </tr>

            <?php }; ?>
        </tbody>
    </table>