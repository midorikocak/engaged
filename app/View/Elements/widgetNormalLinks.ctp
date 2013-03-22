<?php
Cache::set(array('duration' => '+1 year'));
$categories = Cache::read("categories","long");

function icgoster($marray,$in,$html,$authake,$word)
{
    if ($in==0)
    {
        echo "<ul class='nav'>";
    }
    else 
    {
        $parentId = $marray[0]['Category']['parent_id'];
        echo "<ul role='menu' class='dropdown-menu' aria-labelledby='drop".$parentId."'>";
    }
    if(!empty($marray))
    {
        foreach ($marray as $array)
        {
            if ($array['Category']['title'])//&& ($array['Type']['category_id']==$_SESSION['Lang']))
            {
                if (!$array['Category']['link']) // Is not a link
                {
                    if (!$array['children']) // Has Children
                    {
                        echo '<li>'.$html->link(__($word->uCaseWords($array['Category']['title']), true),array('controller'=>'categories','action'=>'show',$array['Category']['id']),array('id'=>'leaf'.$array['Category']['id']));
                    }
                    else if(!$array['children'] && $array['Category']['parent_id']!=0) // No children, No parent
                    {
                        echo '<li>'.$html->link(__($word->uCaseWords($array['Category']['title']), true),array('controller'=>'categories','action'=>'show',$array['Category']['id']),array('id'=>'leaf'.$array['Category']['id']));
                    }
                    else
                    {
                        if($array['Category']['parent_id']==0)
                        {
                            echo '<li class="dropdown wide">'.$html->link(__($word->uCaseWords($array['Category']['title']), true),array('controller'=>'categories','action'=>'show',$array['Category']['id']),array('class'=>'dropper','id'=>'drop'.$array['Category']['id']));
                        }
                        else
                        {
                            echo '<li class="dropdown-submenu">'.$html->link(__($word->uCaseWords($array['Category']['title']), true),array('controller'=>'categories','action'=>'show',$array['Category']['id']),array('class'=>'dropper','id'=>'drop'.$array['Category']['id']));
                        }
                    }
                }
                else
                {
                    echo '<li>'.$html->link(__($word->uCaseWords($array['Category']['title']), true),$array['Category']['link'],'');
                }
            }
            if ($array['children'])
            {
                icgoster($array['children'],1,$html,$authake,$word);
            }
            echo "</li>";

        }
    }
    if($authake->getUserId())
    {
        if(!empty($array))
        {
            echo '<li>'.$html->link('+','#', array('onclick'=>'newCategory('.$array['Category']['parent_id'].')'));
        }
        else
        {
            echo '<li>'.$html->link('+','#', array('onclick'=>'newCategory(0)'));
        }
    }
    echo "</ul>";
}
icgoster($categories,0,$this->Html,$this->Authake,$this->Word);
?>