<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>LOGS</h2>
        </div>
        <div class="card">
            <div class="header">
                <h2>
                   User Activity Logs
                </h2>
            </div>
            <div class="body">
                <?php foreach ($logs as $title => $loggroup) : ?>
                    <div class="list-group">
                        <a href="javascript:void(0);" class="list-group-item active">
                            <?php echo $title; ?>
                        </a>
                        <?php if(empty($loggroup)) : ?>
                            <a href="javascript:void(0);" class="list-group-item">
                              No logs recorded
                            </a>
                        <?php endif; ?>
                        <?php foreach($loggroup as $log) : ?>
                            <a href="<?php echo base_url('user/profile/' . $log['user_id']); ?>" class="list-group-item">
                                <?php echo $log['username']; ?> made an entry on <?php echo $log['updated_on']; ?>
                            </a> 
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>