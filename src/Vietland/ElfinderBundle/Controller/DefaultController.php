<?php

namespace Vietland\ElfinderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Vietland\ElfinderBundle\Entity\Elfinder;
use JMS\SecurityExtraBundle\Annotation\Secure;

class DefaultController extends Controller {

    /**
     * @Route("/upload/user/{folder}.{_format}", name="cpanel_user_upload_image", defaults={"_format"="json","folder"="users"})
     * @Secure(roles="ROLE_USER")
     */
    public function uploadAction($folder = 'users', $_format = 'json') {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $physicalWebDir = getcwd();
        $mediafolder = $physicalWebDir . DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $user->getId() . DIRECTORY_SEPARATOR;
        if (!is_dir($mediafolder)) {
            $old = umask(0);
            mkdir($mediafolder, 0777, true);
            umask($old);
        }
        $userid = $user->getId();

        if (!file_exists($mediafolder)) {
            @mkdir($mediafolder);
        }
        $opts = array(
            'root' => $mediafolder, // path to root directory
            'URL' => DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $userid . DIRECTORY_SEPARATOR, // root directory URL
            'userid' => $userid,
            'rootAlias' => 'Home', // display this instead of root directory name
            'disabled' => array('mkfile', 'duplicate', 'archives', 'extract'),
            'defaults' => array(// default permisions
                'read' => true,
                'write' => true,
                'rm' => true
            ),
//'uploadAllow'   => array('images/*'),
//'uploadDeny'    => array('all'),
//'uploadOrder'   => 'deny,allow'
//'disabled' => array(), // list of not allowed commands
// 'dotFiles'     => false,        // display dot files
// 'dirSize'      => true,         // count total directories sizes
// 'fileMode'     => 0666,         // new files mode
// 'dirMode'      => 0777,         // new folders mode
// 'mimeDetect'   => 'internal',       // files mimetypes detection method (finfo, mime_content_type, linux (file -ib), bsd (file -Ib), internal (by extensions))
            'uploadAllow' => array('image/jpeg', 'image/png', 'image/gif'),
// mimetypes which allowed to upload
//'uploadDeny' => array(), // mimetypes which not allowed to upload
// 'uploadOrder'  => 'deny,allow', // order to proccess uploadAllow and uploadAllow options
// 'imgLib'       => 'mogrify',       // image manipulation library (imagick, mogrify, gd)
// 'tmbDir'       => '.tmb',       // directory name for image thumbnails. Set to "" to avoid thumbnails generation
// 'tmbCleanProb' => 1,            // how frequiently clean thumbnails dir (0 - never, 100 - every init request)
// 'tmbAtOnce'    => 5,            // number of thumbnails to generate per request
// 'tmbSize'      => 48,           // images thumbnails size (px)
// 'fileURL'      => true,         // display file URL in "get info"
// 'dateFormat'   => 'j M Y H:i',  // file modification date format
// 'logger'       => null,         // object logger
// 'defaults'     => array(        // default permisions
// 	'read'   => true,
// 	'write'  => true,
// 	'rm'     => true
// 	),
// 'perms'        => array(),      // individual folders/files permisions
// 'debug'        => true,         // send debug to client
            'archiveMimes' => array('image/x-ms-bmp', "image/jpeg", "image/gif", "image/png"), // allowed archive's mimetypes to create. Leave empty for all available types.
// 'archivers'    => array()       // info about archivers to use. See example below. Leave empty for auto detect
// 'archivers' => array(
// 	'create' => array(
// 		'application/x-gzip' => array(
// 			'cmd' => 'tar',
// 			'argc' => '-czf',
// 			'ext'  => 'tar.gz'
// 			)
// 		),
// 	'extract' => array(
// 		'application/x-gzip' => array(
// 			'cmd'  => 'tar',
// 			'argc' => '-xzf',
// 			'ext'  => 'tar.gz'
// 			),
// 		'application/x-bzip2' => array(
// 			'cmd'  => 'tar',
// 			'argc' => '-xjf',
// 			'ext'  => 'tar.bz'
// 			)
// 		)
// 	)
        );

        $fm = new Elfinder($opts);
        $fm->run();
    }

    /**
     * @Route("/upload/gift", name="levis_upload_gift")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function uploadGiftAction() {
        $folder = 'gift';
        $user = $this->container->get('security.context')->getToken()->getUser();
        $physicalWebDir = getcwd();
        $mediafolder = $physicalWebDir . DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR;
        if (!is_dir($mediafolder)) {
            $old = umask(0);
            mkdir($mediafolder, 0777, true);
            umask($old);
        }
        $userid = $user->getId();

        if (!file_exists($mediafolder)) {
            @mkdir($mediafolder);
        }
        $opts = array(
            'root' => $mediafolder, // path to root directory
            'URL' => DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR, // root directory URL
            'userid' => $userid,
            'rootAlias' => 'Home', // display this instead of root directory name
            'disabled' => array('mkfile', 'duplicate', 'archives', 'extract'),
            'defaults' => array(// default permisions
                'read' => true,
                'write' => true,
                'rm' => true
            ),
            'uploadAllow' => array('image/jpeg', 'image/png', 'image/gif'),
            'archiveMimes' => array('image/x-ms-bmp', "image/jpeg", "image/gif", "image/png"),
        );

        $fm = new Elfinder($opts);
        $fm->run();
    }
    
    /**
     * @Route("/uplodate/facebookimage", name="backend_config_upload_image")
     */
    public function uploadFacebookPictureAction() {
        $folder = 'facebook';
        $user = $this->container->get('security.context')->getToken()->getUser();
        $physicalWebDir = getcwd();
        $mediafolder = $physicalWebDir . DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR;
        if (!is_dir($mediafolder)) {
            $old = umask(0);
            mkdir($mediafolder, 0777, true);
            umask($old);
        }
        $userid = $user->getId();

        if (!file_exists($mediafolder)) {
            @mkdir($mediafolder);
        }
        $opts = array(
            'root' => $mediafolder, // path to root directory
            'URL' => DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR, // root directory URL
            'userid' => $userid,
            'rootAlias' => 'Home', // display this instead of root directory name
            'disabled' => array('mkfile', 'duplicate', 'archives', 'extract'),
            'defaults' => array(// default permisions
                'read' => true,
                'write' => true,
                'rm' => true
            ),
            'uploadAllow' => array('image/jpeg', 'image/png', 'image/gif'),
            'archiveMimes' => array('image/x-ms-bmp', "image/jpeg", "image/gif", "image/png"),
        );

        $fm = new Elfinder($opts);
        $fm->run();
    }

}
