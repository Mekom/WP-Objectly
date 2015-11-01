<?php
namespace oowp\post;

use oowp\core\Singleton;

abstract class PostObjectType extends Singleton {
    /**
     * Required by singleton classes
     * Creates a new instance of this class
     * not to be called ever.
     * Use the static ::instance() method
     * to retrive an instance of this class
     *
     * @return PostType
     */
    public static function newInstance() {
        return new static();
    }

    /**
     * Get all the posts in this post type
     */
    public abstract function getPosts();
}
