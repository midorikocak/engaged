<?php
if(sizeof($category['Pin'])>0)
{
?>
<div class="row" id="<?php echo urlencode($category['Category']['title']);?>">
    <br>
    <?php
    echo $this->element('categoryActions',array(
        "category" => $category
    ));
    echo $this->element('addPin',array(
        "category" => $category
    ));
    ?>
    <p class="lead"><span class="pinLabel"><?php echo $category['Category']['title'];?></span></p>
    <hr>
    <div class="category">
        <?php 
        foreach($category['Pin'] as $pin)
        {
            if($pin['status_id']!=1)
            {
                if(!isset($pin['categoryTitle']))
                {
                    $parentCategory = $category['ParentCategory']['title'];
                    $pin['categoryTitle'] = $category['Category']['title'];
                }
                else
                {
                    $parentCategory = $category['Category']['title'];
                }
                echo $this->element('widgetPin',array(
                    "pin" => $pin,
                    "category" => $category['Category'],
                    "parentCategory" => $parentCategory
                ));
            }
        }
		?>
    </div>
</div>
<?php
}
?>