<?php
class Section extends ActiveRecord\Model {
	static $belongs_to = array(array('category', 'select' => 'id, name'));
}