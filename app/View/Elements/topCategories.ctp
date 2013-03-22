<?php
foreach($topCategories as $category)
{
    echo $this->requestAction('/categories/show/'.$category);
}
?>