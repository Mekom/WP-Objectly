<?php
namespace oowp\post;

abstract class PostType {

    /**
     * Get all the posts in this post type
     */
    public abstract function getPosts();
}
