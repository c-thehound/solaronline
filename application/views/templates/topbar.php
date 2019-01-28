<!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url('/dashboard'); ?>">
                    <?php if((int)$user->user_level === 1) : ?>
                        <?php echo ucfirst($portal); ?> Admin
                    <?php elseif((int)$user->user_level === 0) : ?>
                        <?php echo ucfirst($portal); ?> Data Entry (<?php echo $user->County; ?> County)
                    <?php else : ?>
                        <?php echo ucfirst($portal); ?> Readonly (<?php echo $user->County; ?> County)
                    <?php endif; ?>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->