<?php
namespace PhpSolutions\Image;

class Thumbnail {
    protected $original;
    protected $originalwidth;
    protected $originalheight;
    protected $basename;
    protected $thumbwidth;
    protected $thumbheight;
    protected $maxSize = 120;
    protected $canProcess = false;
    protected $imageType;
    protected $destination;
    protected $suffix = '_thb';
    protected $messages = [];

    public function __construct($image) {
        if (is_file($image) && is_readable($image)) {
            $details = getimagesize($image);
        } else {
            $details = null;
            $this->messages[] = "Cannot open $image.";
        }
        // if getimagesize() returns an array, it looks like an image
        if (is_array($details)) {
            $this->original = $image;
            $this->originalwidth = $details[0];
            $this->originalheight = $details[1];
            $this->basename = pathinfo($image, PATHINFO_FILENAME);
            // check the MIME type
            $this->checkType($details['mime']);
        } else {
            $this->messages[] = "$image doesn't appear to be an image.";
        }
    }

    public function test() {
        echo 'File: ' . $this->original . '<br>';
        echo 'Original width: ' . $this->originalwidth . '<br>';
        echo 'Original height: ' . $this->originalheight . '<br>';
        echo 'Base name: ' . $this->basename . '<br>';
        echo 'Image type: ' . $this->imageType . '<br>';
        if ($this->messages) {
            print_r($this->messages);
        }
    }

    protected function checkType($mime) {
        $mimetypes = array('image/jpeg', 'image/png', 'image/gif');
        if (in_array($mime, $mimetypes)) {
            $this->canProcess = true;
            // extract the characters after 'image/'
            $this->imageType = substr($mime, 6);
        }
    }

}
