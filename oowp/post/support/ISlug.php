<?php
namespace oowp\post\support;

interface ISlug {
    /**
     * Get the post slug
     *
     * @return string the slug
     */
    public function getPostSlug();

    /**
     * Set the post slug
     *
     *
     * @param string $slug The new slug
     * @return void
     */
    public function setPostContent($slug);
}
