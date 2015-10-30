<?php
namespace oowp\post;

class PostPostType extends PostType {
    private static $instance = null;

    public static function instance() {
        if (self::$instance === null) {
            $instance = new self();
        }

        return $instance;
    }

    public function getPosts() {

    }
}
