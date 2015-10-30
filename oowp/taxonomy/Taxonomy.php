<?php
namespace oowp\taxonomy;

abstract class Taxonomy {
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
