<?php

class Photograph extends DatabaseObject {
	protected static $table_name = "tbl_photographs";
	protected static $db_fields = array('id', 'upload_image', 'type', 'size', 'caption' );

	public $id;
	public $upload_image;
	public $type;
	public $size;
	public $caption;

	private $tmp_path;
	protected $upload_dir = "images";
	public $errors = array();

	protected $upload_errors = array(
		// http://www.php.net/manual/en/features.file-upload.errors.php
		UPLOAD_ERR_OK 			=> "No errors.",
		UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
		UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
		UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
		UPLOAD_ERR_NO_FILE 		=> "No file.",
		UPLOAD_ERR_NO_TMP_DIR 	=> "No temporary directory.",
		UPLOAD_ERR_CANT_WRITE 	=> "Can't write to disk.",
		UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
	);

	public function destory(){
		// remove from the Database
		if($this->delete()){
			// remove the file
			$target_path = SITE_ROOT.'public/'.$this->image_path();
			return unlink($target_path);
		}else{
			return false;
		}
	}

	// get image parth
	public function image_path(){
		return $this->upload_dir.'/'.$this->upload_image;
	}

	// Pass in $_FILE(['uploaded_file']) as an argument
	public function attach_file($file){
		// if Nothing was uploaded
		if(!$file || empty($file) || !is_array($file)){
			$this->errors[] = "No file was uploaded.";
			return false;
		}else if($file['error'] != 0){ // If Upload function thorws an error
			$this->errors[] = $this->upload_errors[$file['error']];
			return false;
		}else{
			// Set object attributes to the form parameters
			$this->tmp_path = $file['tmp_name'];
			$this->upload_image = basename($file['name']);
			$this->type = $file['type'];
			$this->size = $file['size'];
		}
	}

	// overwrite Save method
	public function save(){
		if(isset($this->id)){
			$this->update();
		}else{
			// check wheter if there an pre-existing error
			if(!empty($this->errors)){ return false; }

			// Make sure the caption is not too long for the DB
			if(strlen($this->caption) > 255){
				$this->errors[] = "The caption can only be 255 charactor length";
				return false;
			}

			// make sure file name and temp location is available
			if(empty($this->tmp_path) || empty($this->upload_image)){
				$this->errors[] = "File location was not available";
				return false;
			}

			// Determine the target Path
			$target_path = SITE_ROOT.'public/'.$this->upload_dir.'/'.$this->upload_image;

			// Makesure file does not exist
			if(file_exists($target_path)){
				$this->errors[] = "The file {$this->upload_image} alreay exist.";
				return false;
			}

			// Attemt to move the file
			if(move_uploaded_file($this->tmp_path, $target_path)){
				// success
				if($this->create()){
					unset($this->tmp_path);
					return true;
				}
			}else{
				// failure
				$this->errors[] = "The file upload failed. possibly due to incorrect permissions on the upload folder.";
				return false;
			}
		}
	}
}