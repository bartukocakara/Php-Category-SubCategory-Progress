<?php

function buildTree($elements, $parentId = 0)
{
    $branch = array();

    foreach($elements as $element)
    {
        if($element->parent_id == $parentId)
        {
            $children = buildTree($elements, $element->id);

            if($children)
            {
                $element->children = $children;
            }else{
                $element->children = array();
            }

            $branch[] = $element;
        }
    }
    
    return $branch;
}

function drawElements($items)
{
    echo "<ul>";
    foreach($items as $item)
    {
        echo "<li>{$item->title}</li>";

        if(sizeof($item->children) > 0)
        {
            drawElements($item->children);
        }
    }
    echo "</ul>";
}

?>