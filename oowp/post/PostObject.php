<?php
namespace oowp\post;

use std\lang\ExtendableClass;

use WP_Error;
use RuntimeException;

/**
 * Represents any post object
 *
 * The superclass of more spesific PostObject types
 * like Page and Post.
 */
class PostObject extends ExtendableClass {
    private $postID;

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
     * If the insertion of the post failed for any reason
     *
     * @param array $args Anything wp_insert_post would take
     *
     * @return int The id of the post.
     */
    public static function insertPost(array $args) {
        $postId = wp_insert_post($args);

        if (!isset($args["post_title"])) {
            throw new InvalidArgumentException(
                "A title is required to insert a post"
            );
        }

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
    protected final function __construct($postID) {
        $this->extendableInit();
        $this->postID = $postID;
        $this->constructor($postID);
    }

    /**
     * Because the __construct is final,
     * override this instead to supply a constructor to
     * any subclasses of PostObject
     */
    protected function constructor($postID) {}

    /**
     * Get post ID of this post
     *
     * @return int The post id
     */
    public final function getPostID() {
        return $this->postID;
    }

    /**
     * Get the post type
     *
     * @return PostType
     */
    public final function getPostType() {
        return get_post_type($this->getPostID());
    }

    /**
     * Get the post permalink
     *
     * @return string The permalink
     */
    public final function getPostPermalink() {
        return get_permalink($this->getPostID());
    }
}
