<?php
namespace oowp\post\support;

use oowp\user\User;

interface IAuthor {

    /**
     * Get the author
     *
     * @return oowp\user\User The author
     */
    public function getAuthor();

    /**
     * Set the author
     *
     * @param User $user The new author
     * @return void
     */
    public function setAuthor(User $user);
}
