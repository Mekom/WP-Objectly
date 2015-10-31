<?php
namespace oowp\taxonomy;

class Category extends Taxonomy {

    public function getTaxonomySlug() {
        return "category";
    }

    public function getTerms() {
        $terms = get_terms($this->getTaxonomySlug(), array( 'hide_empty' => 0 ));
        $termObjects = [];

        foreach($terms as $term) {
            $termObjects[] = CategoryTerm::fromTermID($term->term_id);
        }

        return $termObjects;
    }

}
