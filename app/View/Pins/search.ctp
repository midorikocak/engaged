
<div class="row">
    <br>
    <p class="lead"><span class="pinLabel"><?php echo __(sizeof($pins).' found');?></span></p>
    <hr>
    <div class="category">
        <?php 
            foreach ($pins as $pin)
            {
                if($pin['Pin']['status_id']!=1)
                {
                    $parentCategory = $pin['Category']['ParentCategory'];
                    $pin['Pin']['categoryTitle'] = $pin['Category']['title'];
                    echo $this->element('widgetPin',array(
                        "pin" => $pin['Pin'],
                        "category" => $pin['Category'],
                        "parentCategory" => $parentCategory
                            ));
                }
            } 
        ?>
    </div>
</div>
<div class="pagination">
    <ul>
        <?php
        echo '<li>'.$this->Paginator->prev('«', array(), null, array('class' => 'prev disabled')).'</li>';
        echo $this->Paginator->numbers(array('separator' => '', 'before'=>'<li>', 'after'=>'</li>'));
        echo '<li>'.$this->Paginator->next('»', array(), null, array('class' => 'next disabled')).'</li>';
        ?>					
    </ul>
</div>

