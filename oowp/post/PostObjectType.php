<?php
namespace oowp\post;

use oowp\core\Singleton;

abstract class PostType extends Singleton {

    /**
     * Get all the posts in this post type
     */
    public abstract function getPosts();
}
