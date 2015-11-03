<?php
namespace oowp\post\support;

interface IAutosave {
    /**
     * Get the auto saved revision.
     *
     * @return Revision|null The autosave revision, or null if none.
     */
    public function getAutosave();
}
