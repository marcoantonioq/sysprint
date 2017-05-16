<?php 
namespace AuthUser\Model\Entity;

use Cake\Core\Configure;
use AuthUser\Model\Entity\User;

class ActiveDirectory {

    private static $ldap_host;
    private static $ldap_port;
    private static $base_dn;
    private static $ldap_user;
    private static $ldap_pass;
    private static $suffix;
    private static $attr;
    private static $filter;
    private static $con;
    private static $status_conect;
    private static $instance = null;

    /**
     * Retorna uma instância única de uma classe.
     *
     * @staticvar Singleton $instance A instância única dessa classe.
     *
     * @return Singleton A Instância única.
     */
    public static function getConnect() {
        if (!extension_loaded('ldap')) {
            echo 'Você deve ativar a extensão ldap em php.ini para usar o SYSPrint:AD.'; exit;
        }
        if (null === self::$instance) {
            self::$instance = new static();
        }
        $config = Configure::read('SYSPRINT.MODULES.AD.Config');
        self::$ldap_host = $config['ldap_host'];
        self::$ldap_port = $config['ldap_port'];
        self::$base_dn = $config['base_dn'];
        self::$ldap_user = $config['ldap_user'];
        self::$ldap_pass = $config['ldap_pass'];
        self::$suffix = $config['suffix'];
        self::$attr = explode(',',$config['attr']);
        self::$filter = $config['filter'];
    

        try {
            ldap_set_option(NULL, LDAP_OPT_DEBUG_LEVEL, 7);
            putenv('LDAPTLS_REQCERT=never');
            self::$con = ldap_connect( self::$ldap_host, self::$ldap_port);
            if (!is_resource(self::$con)) trigger_error("Unable to connect to ".self::$ldap_host,E_USER_WARNING);

            ldap_set_option(self::$con, LDAP_OPT_NETWORK_TIMEOUT, 3);
            ldap_set_option(self::$con, LDAP_OPT_TIMELIMIT, 3);
            ldap_set_option(self::$con, LDAP_OPT_PROTOCOL_VERSION, 3);
            if( @ldap_bind(self::$con, self::$ldap_user, self::$ldap_pass) ) {
                self::$status_conect = true;
            } else {
                self::$status_conect = false;                
            }
        } catch (Exception $e) { 
            echo "Erro ao conectar no servidor AD"; exit;
        }
        return self::$instance;
    }

    public function searchUser($username, $password = null){
        $filter = "(".self::$filter."(name={$username}))";
        $read = @ldap_search(self::$con, self::$base_dn, $filter, self::$attr);
        if($read) {
            $User = new User();
            return $User->ldapSetEntries(ldap_get_entries(self::$con, $read), $password);
        } else {
            return false;
        }
    }
    
    public function auth($user, $password){
        if( @ldap_bind(self::$con, $user.self::$suffix, $password) ) {
            return $this->searchUser($user, $password);
        } else {
            return false;
        }
    }

    public function read($username){
        $user = ['User'=>[],'Group'=>[]];
            $userAD = self::searchUser($username);
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

    private function Synchronize($username)
    {
        $registration = $this->GetRegistration();

        $registration->Synchronize(
            new AuthenticatedUser(
                $username,
                $this->user->GetEmail(),
                $this->user->GetFirstName(),
                $this->user->GetLastName(),
                $this->password,
                Configuration::Instance()->GetKey(ConfigKeys::LANGUAGE),
                Configuration::Instance()->GetDefaultTimezone(),
                $this->user->GetPhone(), $this->user->GetInstitution(),
                $this->user->GetTitle())
        );
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
        @ldap_close(self::$con);
    }
    private function __clone() { }
    private function __wakeup() { }

}