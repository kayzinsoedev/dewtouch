<?php


class FileUpload extends AppModel {

    /* validation */
    public $validate = array(
	    'file' => array(
	        'extension' => array(
	            'rule' => array('extension', array('csv')),
	            'message' => 'Please Upload CSV file'
        	),

	        'mimeType' => array(
	            'rule' => array('mimeType', array('application/vnd.ms-excel')),
	            'message' => 'Please Upload CSV file'
	        ),
	    )
	);


}