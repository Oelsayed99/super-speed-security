<?php
require 'app/Database.php';
require 'app/Storage.php';

use App\Storage;

$success = Storage::updateMedia('hero-video', '/storage/uploads/videos/luffy-hero.mp4');
echo $success ? "Success" : "Failed";
