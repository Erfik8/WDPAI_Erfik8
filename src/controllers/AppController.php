<?php

class AppController {

    protected function render(string $template = null, array $variables = [])
    {
        extract($variables);
        if(isset($device))
        {
            $templatePath = 'public/views/'. $device.'/'.$template.'.php';
        }
        else
        {
            $templatePath = 'public/views/'. $template.'.php';
        }
        $output = 'File not found';
                
        if(file_exists($templatePath)){
            
            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }
        print $output;
    }
}