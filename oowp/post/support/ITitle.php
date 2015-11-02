<?php
namespace oowp\post\support;

interface ITitle {
    /**
     * Get the post title
     *
     * @return string The title
     */
    public function getPostTitle();

    /**
     * Set the post title
     *
     *
     * @param string $title The new title
     * @return void
     */
    public function setPostTitle($title);
}
