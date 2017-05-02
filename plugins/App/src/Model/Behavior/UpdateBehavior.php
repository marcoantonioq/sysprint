<?php
namespace APP\Model\Behavior;
use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * Update behavior
 */
class UpdateBehavior extends Behavior
{
    public $_currentVersion = null;
    private $_latestVersion = null;
    private $_dir = '';
    private $_log = '';
    private $_installDir = '';
    private $_branch = '';
    protected $_updateUrl = 'http://github.com/marcoantonioq/sysprint3';
    protected $_updateFile = 'file://';
    private $dirPermissions = 0755;
    private $_username = '';
    private $_password = '';
    const NO_UPDATE_AVAILABLE = 0;
    const ERROR_INVALID_ZIP = 10;
    const ERROR_VERSION_CHECK = 20;
    const ERROR_INSTALL_DIR = 35;
    const ERROR_DOWNLOAD_UPDATE = 40;
    const ERROR_DELETE_TEMP_UPDATE = 50;
    const ERROR_INSTALL = 60;
    const ERROR_SIMULATE = 70;
    /**
     * Create new instance
     *
     * @param string $tempDir
     * @param string $installDir
     * @param int    $maxExecutionTime
     */
    public function __construct(Table $table=null, $settings = null, $installDir = null, $maxExecutionTime = 60)
    {
        // Init logger

        $this->setUpdateFile($settings['_updateFile']);
        $this->setUpdateUrl($settings['_updateUrl']);
        $this->setCurrentVersion();
    }

    public function setUpdateFile($updateFile)
    {
        $this->_updateFile = $updateFile;
        return $this;
    }

    public function setUpdateUrl($updateUrl)
    {
        $this->_updateUrl = $updateUrl;
        exec("git remote add origin {$this->_updateUrl}");
        return $this->_updateUrl;
    }

    public function setBranch($branch)
    {
        $this->_branch = $branch;
        return $this;
    }
    
    public function setCurrentVersion()
    {
        exec("cd {$this->_updateFile}; git tag | tail -n 1",$version);
        $this->_currentVersion = $version[0];
        return $this->_currentVersion;
    }

    public function setLatestVersion()
    {
        exec("cd {$this->_updateFile}; git ls-remote --tags {$this->_updateUrl} | 
        awk '{print $2}' | grep -v '{}' | awk -F'/' '{print $3}' | tail -n 1",$version);
        $this->_latestVersion = $version[0];
        return $this->_latestVersion;
    }
   
    public function checkUpdate()
    {
        $this->setCurrentVersion();
        $this->setLatestVersion();        
        if(strcmp($this->_currentVersion, $this->_latestVersion)){
            // pr("Atualize para a nova versão: {$this->_latestVersion}");
            return $this->_latestVersion;
        } else {
            // pr("Esta atualizado: {$this->_currentVersion}");
            return false;
        }
    }

    public function update( )
    {
        if($this->checkUpdate()) {
            // exec("cd {$this->_updateFile}; git clean -f -d ; git reset --hard HEAD ; git pull origin master ; git pull origin master --tag;",$version, $result);
            if($result){
                echo "Atualizado com sucesso";
                return true;
            } else {
                echo "<b>Não</b> atualizado com sucesso";
                return false;
            }

        }
    }
        
    
}