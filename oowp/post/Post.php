<?php
namespace oowp\post;

class Post extends PostObject {

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
