<?php 
namespace AuthUser\Controller\Component;

use Cake\Core\Configure;


class AD {

    private static $ldap_host;
    private static $ldap_port;
    private static $base_dn;
    private static $ldap_user;
    private static $ldap_pass;
    private static $suffix;
    private static $attr;
    private static $filter;
    private static $ldap_connect;
    private static $instance = null;

    /**
     * Retorna uma instância única de uma classe.
     *
     * @staticvar Singleton $instance A instância única dessa classe.
     *
     * @return Singleton A Instância única.
     */
    public static function getConnect() {

        if (null === self::$instance) {
            echo "new instance";
            self::$instance = new static();
        }
        $config = Configure::read('SYSPRINT.MODULES.AD.Config');
        self::$ldap_host = $config['ldap_host'];
        self::$ldap_port = $config['ldap_port'];
        self::$base_dn = $config['base_dn'];
        self::$ldap_user = $config['ldap_user'];
        self::$ldap_pass = $config['ldap_pass'];
        self::$suffix = $config['suffix'];
        self::$attr = $config['attr'];
        self::$filter = $config['filter'];
        try {
            $ldap_connect = ldap_connect( self::$ldap_host, self::$ldap_port) or die("Could not connect to ".self::$ldap_host);
            ldap_set_option($ldap_connect, LDAP_OPT_NETWORK_TIMEOUT, 3);
            ldap_set_option($ldap_connect, LDAP_OPT_TIMELIMIT, 3);
            ldap_set_option($ldap_connect, LDAP_OPT_PROTOCOL_VERSION, 3);
            $bind = @ldap_bind($ldap_connect, self::$ldap_user, self::$ldap_pass); 
            self::$ldap_connect = $ldap_connect;
        } catch (Exception $e) { 
            echo "Erro ao conectar no servidor AD"; exit;
        }
        return self::$instance;
    }

    public function search($filter){
        $result=null;
        try {
          $read = ldap_search(self::$ldap_connect, self::$base_dn, $filter, self::$attr); # or die("Erro search");
          $result = ldap_get_entries(self::$ldap_connect, $read);
        } catch (Exception $e) {}
        return $result;
        }
        public function auth($user, $password){
        return (@ldap_bind(self::$ldap_connect, $ldap_user.self::$suffix, $ldap_pass))?true:false;
    }

    public function read($username){
        $user = ['User'=>[],'Group'=>[]];
            $filter = "(".self::$filter."(name={$username}))"; // username
            $userAD = self::search($filter);
            if(empty($userAD['0']['displayname']['0']))
                return null;
        try {
            @$user['User']['name'] = $userAD['0']['displayname']['0'];
            @$user['User']['email'] = $userAD['0']['mail']['0'];
            if ( !empty($userAD['0']['thumbnailphoto']['0']) ) {
                  $finfo = new finfo(FILEINFO_MIME_TYPE);
                  @$mime = explode(';', $finfo->buffer($userAD['0']['thumbnailphoto']['0']));
                  @$user['User']['thumbnailphoto'] = "data:image/jpeg;base64," . base64_encode($userAD['0']['thumbnailphoto']['0']);
            }

            if (!empty($userAD['0']['memberof']['count']) && $userAD['0']['memberof']['count'] >= 1) {
                foreach ($userAD['0']['memberof'] as $group) {
                    foreach (explode(',',$group) as $CNs) {
                        $cn=explode('=',$CNs);
                        if($cn[0]=="CN"){
                            @$user['Group']['Group'][]=$cn[1];
                        }
                    }
                }
            }
        } catch (Exception $e) {}
        return $user;
    }

    public function syc($users = array()){
        foreach ($users as $key => $user) {
          // pr($user);
          // pr($this->read($user['User']['username']));
          $users[$key] = @array_merge($user, $this->read($user['User']['username']) );
        }
        return $users;
    }

    protected function __construct() { }
    public function __destruct(){
        @ldap_close(self::$ldap_connect);
    }
    private function __clone() { }
    private function __wakeup() { }

}