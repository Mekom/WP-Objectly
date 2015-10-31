<?php
namespace oowp\taxonomy;

use oowp\core\Singleton;

abstract class Taxonomy extends Singleton {
    /** @var static Singleton. The instance */
    private static $instance = null;

    public final static function newInstance() {
        return new static();
    }

    /**
     * Get the slug from this taxonomy
     *
     * @return string
     */
    public abstract function getTaxonomySlug();

    /**
     * Get the terms for this taxonomy
     *
     * @return TaxonomyTerm[]
     */
    public abstract function getTerms();
}
