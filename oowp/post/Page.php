<?php
namespace oowp\post;

class Post extends PostObject {
    protected function constructor($postID) {
        // Check the type
        if ($this->getPostType() !== "page") {
            throw new InvalidArgumentException(
                "The id \"$id\" is not a valid id for a " .
                "post of type \"page\"."
            );
        }
    }
}
