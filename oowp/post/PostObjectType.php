<?php
namespace oowp\post;

use oowp\core\Singleton;

abstract class PostObjectType extends Singleton {
    public static function newInstance() {
        return new static();
    }

    /**
     * Get all the posts in this post type
     */
    public abstract function getPosts();
}
