<?php
class File extends ActiveRecord\Model {
	static $belongs_to = array(array('section', 'select' => 'id, name'));
}