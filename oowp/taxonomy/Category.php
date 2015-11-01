<?php
namespace oowp\taxonomy;

class Category extends Taxonomy {

    /**
     * Get the slug for this taxonomy
     *
     * @return string The slug
     */
    public function getTaxonomySlug() {
        return "category";
    }


    public function toTerm($termID) {
        return CategoryTerm::fromTermID($termID);
    }
}
