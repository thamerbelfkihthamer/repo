<?php
class Directoryinfo {

    public function readDirectory($Directory, $Recursive = true, $level = 0) {
        if (is_dir($Directory) === false) {
            return false;
        }
        $level++;
        try {
            $Resource = opendir($Directory);
            $Found = array();

            while (false !== ($Item = readdir($Resource))) {
                if ($Item == "." || $Item == ".." || $Item == ".DS_Store" || $Item == ".svn") {
                    continue;
                }
                if ($Recursive === true && is_dir($Directory . $Item)) {
                    $Directoryname = $Directory . $Item . '/';
                    if ($level == 2 && $Item != "controllers") {
                        continue;
                    }
                    if ($Item == 'controllers') {
                        $Found = $this->readDirectory($Directoryname, true, $level);
                    } else
                        $Found[$Item] = $this->readDirectory($Directoryname, true, $level);
                }else {
                    $filename = $Directory . $Item;
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if ($ext == "php") {
                        $classname = ucfirst(str_replace('.php', '', $Item));
                        $Found[] = $classname;
                    }
                }
            }
        } catch (Exception $e) {
            return false;
        }
        return $Found;
    }

    public function getMethodes($Directory, $module , $controleur, $Recursive = true ,$level = 0 ) {
        if (is_dir($Directory) === false) {
            return false;
        }
        $level++;
        try {
            $Resource = opendir($Directory);
            $methodNames = array();

            $filename = $Directory . $module . '/controllers/' . $controleur . '.php';
            $classname = ucfirst($controleur);

            require_once($filename);
            $reflector = new ReflectionClass($classname);
            $methodNames = array();
            $lowerClassName = strtolower($classname);
            foreach ($reflector->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                if (strtolower($method->class) == $lowerClassName) {
                    if ($method->name != "__construct"){
                        $reader = new DocBlockReader($classname, $method->name);
                        $params = $reader->getParameters();
                        if (array_key_exists('Acl', $params)) {
                            if($params['Acl'] == 'yes'){
                            $methodNames[] = $method->name;
                            }
                        }
                    }
                }
            }
            $Found[] = $classname;
                    
        } catch (Exception $e) {
            return false;
        }
        return $methodNames;
    }
    
}
