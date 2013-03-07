<?php

Class Plugins extends zMCustomPostTypeBase {

    private $my_cpt;

    public function __construct(){
        /**
         * Run the parent construct method.
         *
         * Our parent construct has the init's for register_post_type
         * register_taxonomy and many other usefullness.
         */
        parent::__construct();
    }
}

