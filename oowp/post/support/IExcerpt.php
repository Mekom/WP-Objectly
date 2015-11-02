<?php
namespace oowp\post\support;

interface IExcerpt {
    /**
     * Get the excerpt
     *
     * @return string The excerpt
     */
    public function getExcerpt();

    /**
     * Set the excerpt
     *
     * @param string $excerpt The new excerpt
     * @return void
     */
    public function setExcerpt($excerpt);
}
