<?php
namespace PhpSolutions\File;
class Upload {

    protected $uploaded = [];
    protected $destination;
    protected $max = 51200;
    protected $messages = [];
    protected $permitted = [
        'image/gif',
        'image/jpeg',
        'image/pjpeg',
        'image/png'
    ];

    public function __construct($path) {
        if (!is_dir($path) || !is_writable($path)) {
            throw new \Exception("$path must be a valid, writable directory.");
        }
        $this->destination = $path;
    }

    public function upload() {
        $uploaded = current($_FILES);
        if ($this->checkFile($uploaded)) {
            $this->moveFile($uploaded);
        }
    }

    public function getMessages() {
        return $this->messages;
    }

    protected function checkFile($file) {
        return true;
    }

    protected function moveFile($file) {
        $success = move_uploaded_file($file['tmp_name'], $this->destination . $file['name']);
        if ($success) {
            $result = $file['name'] . ' was uploaded successfully';
            $this->messages[] = $result;
        } else {
            $this->messages[] = 'Could not upload ' . $file['name'];
        }
    }

}