<?php
namespace oowp\post;

abstract class PostObject {
    /* -------------------- */
    /* # STATIC INTERFACE # */
    /* -------------------- */

    /**
     * Get a post object from the ID
     * When creating a subclass, override this, and
     * only this static method.
     *
     * @return Post
     */
    public static function fromPostID($id) {
        return new static($id);
    }

    /* ---------------------- */
    /* # INSTANCE INTERFACE # */
    /* ---------------------- */

    /**
     * Create a new post object from id
     *
     * @param int $postID The post id
     */
    protected abstract function __construct($postID);

    /**
     * Get post ID of this post
     *
     * @return int The post id
     */
    public abstract function getPostID();

    /**
     * Get the post type
     *
     * @return PostType
     */
    public final function getPostType() {}

    /**
     * Get the post title
     *
     * @return string The title
     */
    public final function getPostTitle() {}

    /**
     * Set the post title
     *
     *
     * @param string $title The new title
     * @return void
     */
    public final function setPostTitle($title) {}

    /**
     * Get the post content
     *
     * @return string the content
     */
    public final function getPostContent() {}

    /**
     * Set the post content
     *
     *
     * @param string $content The new content
     * @return void
     */
    public final function setPostContent($content) {}

    /**
     * Get the post permalink
     *
     * @return string The permalink
     */
    public final function getPostPermalink() {
        return get_permalink($this->getPostID());
    }

    /**
     * Set the post permalink
     *
     * @param string $perma The permalink
     *
     * @return void
     */
    public final function getPostPermalink($perma) {
        return set_permalink($this->getPostID(), $perma);
    }

    /**
     * Get a post meta.
     * Returns null if there is no value
     *
     * @param string $key
     * @return string|null The value for the meta.
     */
    public final function getPostMeta($key) {}

    /**
     * Set the value of a meta
     * Creates the meta key if it does not already exist
     *
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public final function setPostMeta() {}
}
