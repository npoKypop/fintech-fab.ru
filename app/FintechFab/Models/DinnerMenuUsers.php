<?php

namespace FintechFab\Models;

use Eloquent;

/**
 * Class DinnerMenuUsers
 *
 * @package FintechFab\Models
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $dinner_menu_item_id
 * @property integer $count
 * @property string  $updated_at
 * @property string  $created_at
 */
class DinnerMenuUsers extends Eloquent
{
	protected $fillable = array('user_id', 'dinner_menu_item_id', 'count');

	protected $table = 'dinner_menu_users';
}