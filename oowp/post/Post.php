<?php
namespace oowp\post;

use oowp\post\support\Hierarchical;
use oowp\post\support\IHierarchical;

class Post extends PostObject implements IHierarchical{
    use Hierarchical;

    protected function constructor($postID) {
        // Check the type
        if ($this->getPostType() !== "post") {
            throw new InvalidArgumentException(
                "The id \"$id\" is not a valid id for a " .
                "post of type \"post\"."
            );
        }
    }

}
