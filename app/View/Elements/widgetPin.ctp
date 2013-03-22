<div class="span3 model">
    <?php 
    $pinId = md5($pin['id'].$pin['title'].$category['id']);
    ?>
    <div class="pin">
        <a href="#<?php echo $pinId;?>" data-toggle="modal">
        <?php
        echo $this->Html->image($pin['picture'], array('alt' => $pin['title']));
        ?>
        </a>
        <div id="<?php echo $pinId;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="#<?php echo $pinId;?>Label" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 class="lead" id="<?php echo $pinId;?>Label"><?php echo $pin['title']; ?></h3>
          </div>
          <div class="modal-body">
              <?php
              echo $this->Html->image($pin['picture'], array('alt' => $pin['title']));
              ?>
            <p><?php echo $pin['description']; ?></p>
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <a href="<?php echo $pin['link'];?>"><button class="btn btn-success"><?php echo __('Go to site');?></button></a>
          </div>
        </div>
        <p><?php echo $pin['title'];?><br><small><?php
        if($parentCategory)
        {
            echo $parentCategory."  - ".$pin['categoryTitle'];
        }
        else
        {
            echo $pin['categoryTitle'];
        }
        
        ?></small></p>
        <p>
            <a class="btn btn-info btn-small" href="#<?php echo $pinId;?>" data-toggle="modal"><?php echo __('View Details');?></a>
            <a class="btn btn-small" href="<?php echo $pin['link'];?>"><?php echo __('Go to site');?></a></p>
    </div>
</div>