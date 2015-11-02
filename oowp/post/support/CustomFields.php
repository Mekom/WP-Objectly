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
}
