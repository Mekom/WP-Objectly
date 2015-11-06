<?php
namespace oowp\post\support;

trait CustomFields {
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

    /**
     * Remove a post meta
     *
     * @param string $key The key
     * @return void
     */
    public final function deletePostMeta($key) {
        delete_post_meta($this->getPostID(), $key);
    }

    /**
     * Check if this post has a spesific post meta.
     * This is simply a wrapper function that compares
     * the result of getPostMeta($key) with empty string.
     *
     * @param string $key The key
     * @return bool true if yes, false if no
     */
    public final function hasPostMeta($key) {
        return $this->getPostMeta($key) !== "";
    }
}
