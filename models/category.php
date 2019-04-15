<?php
class Category extends ActiveRecord\Model {
	static $has_many = array(
      array('sections', 'order' => 'name asc')
    );
}