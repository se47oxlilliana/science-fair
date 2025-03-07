
<?php 

//Function to get all files in a directory
function getFiles($dir) {
    $files = array();
    foreach (scandir($dir) as $file) {
        if (substr($file, 0, 1) !== '.') {
            $files[] = $file;
        }
    }
    return $files;
}

//Function to get the file type based on extension
function getFileType($file) {
    switch(strtolower(pathinfo($file, PATHINFO_EXTENSION))) {
        case 'doc':
        case 'docx':
            return 'Word document';
        case 'xls':
        case 'xlsx':
            return 'Excel spreadsheet';
        case 'ppt':
        case 'pptx':
            return 'PowerPoint presentation';
        case 'pdf':
            return 'PDF document';
        default:
            return 'Other';
    }
}

//Function to get the file size in a human-readable format
function getFileSize($file) {
    $bytes = filesize($file);
    if ($bytes < 1024) {
        return $bytes . ' B';
    } elseif ($bytes < 1048576) {
        return round($bytes / 1024, 2) . ' KB';
    } elseif ($bytes < 1073741824) {
        return round($bytes / 1048576, 2) . ' MB';
    } else {
        return round($bytes / 1073741824, 2) . ' GB';
    }
}

//Function to get the last modified time of a file
function getFileModifiedTime($file) {
    return date('Y-m-d H:i:s', filemtime($file));
}

//Get all files in the directory and loop through them
$files = getFiles('/path/to/directory');
foreach ($files as $file) {
    //Skip hidden files and directories
    if (substr($file, 0, 1) === '.') {
        continue;
    }
    
    //Get the file type based on extension
    $type = getFileType($file);
    
    //Get the file size in a human-readable format
    $size = getFileSize($file);
    
    //Get the last modified time of the file
    $modifiedTime = getFileModifiedTime($file);
    
    echo "$file ($type, $size, $modifiedTime)<br>";
}

?>