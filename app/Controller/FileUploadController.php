<?php

class FileUploadController extends AppController {
	public function index() {
		$this->set('title', __('File Upload Answer'));

		$file_uploads = $this->FileUpload->find('all');
		$this->set(compact('file_uploads'));

		if( !empty($this->request->data['FileUpload']['file']['name']) ){
			$fileName = $this->request->data['FileUpload']['file']['name'];
            $uploadPath = 'uploads/files/';
            $uploadFile = $uploadPath.$fileName;


            $mimetype = $this->request->data['FileUpload']['file']['type'];
            $filetype = pathinfo($fileName, PATHINFO_EXTENSION);
            /*check mimetype */
            if(in_array($mimetype, array('application/vnd.ms-excel'))) {
            	/*check filetype */
            	if($filetype == "csv"){          		
            		if(move_uploaded_file($this->request->data['FileUpload']['file']['tmp_name'],$uploadFile)){
		            	$handle = fopen($uploadFile, "r");
		            	$data = fgetcsv($handle);
		            	while ($data = fgetcsv($handle)){
				    		$data_array = array(
				                'name' => $data[0],
				                'email' => $data[1],
				                'created' => date('Y-m-d H:i:s'),
				            );	
			            	$this->FileUpload->create();
							$this->FileUpload->save($data_array);
		            	}
		            	fclose($handle);           	
	            	}

				}else{
					echo "Please Upload Only CSV file!";exit();
				}	

			}else{
				echo "Please Upload the correct file!";exit();
			}

		}
	}
}