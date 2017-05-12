<?php
namespace Sys\Shell;

use Cake\Console\Shell;

/**
 * Printer shell command.
 */
class PrinterShell extends Shell
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Printers');
    }

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        $this->out('Hello world Novo.');
        $this->out($this->OptionParser->help());
    }

    public function quota()
    {
        $printers = $this->Printers->find();
        foreach ($printers as $key => $value) {
            $cmd = "lpadmin -p '${value['name']}' -o job-quota-period=${value['quota_period']} -o job-page-limit=${value['page_limite']} -o job-k-limit=${value['k_limit']}";
            exec($cmd);
        }
    }
}
