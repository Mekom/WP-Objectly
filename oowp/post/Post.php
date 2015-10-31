<?php
namespace oowp\post;

class Post extends PostObject {
    private $postID;

    protected function __construct($postID) {
        $this->postID = $postID;
    }

    public function getPostID() {
        return $this->postID;
    }
}
