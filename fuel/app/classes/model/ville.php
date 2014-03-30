<?php

class Model_Ville extends \Model_Crud
{
	protected static $_properties = array(
		'id',
		'nom',
		'code_postal',
		'pays',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	
	protected static $_table_name = 'ville';
		
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('nom', 'Nom', 'required|max_length[100]');
		$val->add_field('code_postal', 'Code Postal', 'required|max_length[5]');
		$val->add_field('pays', 'Pays', 'required|max_length[255]');

		return $val;
	}
	
	protected static function pre_find(&$query)
	{
	    // alter the query
	    $query->order_by('nom', 'asc');
	}
	
	public static function post_find($result)
	{
	    if($result !== null)
	    {
	    	foreach ($result as $value) {
				if (!empty($value->pays)) {
					$pays = Model_Pays::find_one_by_id($value->pays)->nom;
					$value->set(array(
			    		'pays' => $pays,
						));
				}
			}
	    }
	    
	    // return the result
	    return $result;
	    
	}

}
