<?php
namespace oowp\taxonomy;

interface ITaxonomyTerm {
    /**
     * Get a taxonomy term from a term id
     *
     * @return static The term
     */
    static function fromTermID($termID);

    /**
     * Get a taxonomy term from a term slug
     *
     * @return static The term
     */
    static function fromTermSlug($termSlug);

    /**
     * Get the taxonomy for this term
     *
     * @return Taxonomy
     */
    static function getTaxonomy();
}
