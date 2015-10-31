<?php
namespace oowp\post;

use WP_Error;
use RuntimeException;

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

    /**
     * Insert a post.
     * Wraps around the wp_insert_post function, and
     * the $args argument take anything that wp_insert_post
     * does
     *
     * To create a post, ommit the ID from $args
     *
     * @throws RuntimException
     *
     * @param array $args Anything wp_insert_post would take
     *
     * @return int The id of the post.
     */
    public static function insertPost(array $args) {
        $postId = wp_insert_post($args);
        if ($postId === 0 || $postId instanceof WP_Error) {
            throw new RuntimeException("Failed to create new post.");
        }
        return $postId;
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
    public final function getPostType() {
        return get_post_type($this->getPostID());
    }

    /**
     * Get the post title
     *
     * @return string The title
     */
    public final function getPostTitle() {
        return get_the_title($this->getPostID());
    }

    /**
     * Set the post title
     *
     *
     * @param string $title The new title
     * @return void
     */
    public final function setPostTitle($title) {
        $post = array(
            'ID'           => $this->getPostID(),
            'post_title'   => $title,
        );
        wp_update_post( $post );
    }

    /**
     * Get the post content
     *
     * @return string the content
     */
    public final function getPostContent() {
        $post = get_post($this->getPostID());
        return $post->post_content;
    }

    /**
     * Set the post content
     *
     *
     * @param string $content The new content
     * @return void
     */
    public final function setPostContent($content) {
        $post = array(
            'ID'           => $this->getPostID(),
            'post_content' => $content,
        );
        wp_update_post( $post );
    }

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
    public final function getPostMeta($key) {
        return get_post_meta($this->getPostID(), $key, true);
    }

    /**
     * Set the value of a meta
     * Creates the meta key if it does not already exist
     *
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public final function setPostMeta($key, $value) {
        update_post_meta($this->getPostID(), $key, $value);
    }
}
