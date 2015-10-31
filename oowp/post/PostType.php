<?php
namespace oowp\post;

class PostType extends PostObjectType {
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
