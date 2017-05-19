<?php
namespace Sys\Model\Entity;
use Cake\ORM\TableRegistry;
use AuthUser\Model\Entity\User;

class Spool 
{

	public function send($data)
	{
		$_imagetypes = array(
            'application/odt',
            'application/pdf',
            'application/txt',
            // 'application/doc',
            // 'application/msword',
            // 'application/wps-office.doc',
            // 'application/wps-office.docx',
            // 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            // 'application/wps-office.xls',
            // 'application/wps-office.xlt',
            // 'image/bmp',
            // 'image/vnd.microsoft.icon',
            // 'image/x-icon',
            // 'text/plain',
            'image/gif',
            'image/jpeg',
            'image/pjpeg',
            'image/png',
        );

		$Users = TableRegistry::get('Users');
        $user = $Users->get($data['user_id']);
        $printer = $data['printer_id'];

        foreach ($data['file'] as $file) {
            $path = $file['tmp_name'];

            if ( array_search($file['type'], $_imagetypes) === false ){
                echo "O tipo de arquivo \"{$file['name']}\" enviado é inválido! (Arquivos válidos: PDF, txt, png, jpge)"; exit;
            }

            $data['params'] = array_filter($data['params'], function($value) { return $value !== ''; });
            $params = " -o fit-to-page";
            $keyparams = [
                'copies' => ' -n ',
                'pages' => ' -o page-ranges=',
                'double_sided' => ' -o sides=',
                'page_set' => ' -o page-set=',
                'media' => ' -o media=',
                'orientation' => ' -o orientation-requested=',
            ];
            foreach ($data['params'] as $key => $value){
                $params .= "{$keyparams[$key]}{$value} ";
            }
            $cmd = "lp -U {$user->username} -d {$printer} $params $path"; 
            exec($cmd, $output, $return);
            exec("rm -rf $path {$file['tmp_name']}");
            return $output;
        }
        return false;
	}
    


}
