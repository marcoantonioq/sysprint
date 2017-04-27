<?php
namespace Prints\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

/**
 * Spool Form.
 */
class SpoolForm extends Form
{
    /**
     * Builds the schema for the modelless form
     *
     * @param \Cake\Form\Schema $schema From schema
     * @return \Cake\Form\Schema
     */
    protected function _buildSchema(Schema $schema)
    {
        return $schema
                ->addField('users', [
                    'empty'=>'Selecione usuário...',
                ])
                ->addField('file', [
                    'type'=>'file',
                    
                ])
                ->addField('params.copies', [
                    'type'=>'int',
                    
                ])
                ->addField('printer', [
                    'type' => 'string'
                ]);
    }

    /**
     * Form validation builder
     *
     * @param \Cake\Validation\Validator $validator to use against the form
     * @return \Cake\Validation\Validator
     */
    protected function _buildValidator(Validator $validator)
    {
        return $validator
            ->add('user_id', 'valid', [
                'rule' => 'numeric', 
                'message' => 'Selecione impressora',
                'notEmpty',
            ])
            ->add('params.copies', 'custom', [
                'rule' => function ($data, $context) {
                    if ($data >= 1 ) {return true;}
                    return false;                  
                },                                    
                'message' => '',
                'notEmpty',
            ])
            ->add('printers', 'length', [
                'rule' => ['minLength', 2], 
                'message' => 'Selecione impressora',
                'notEmpty',
            ])
            ->add('file[]', 'valid', [
                'rule' => 'typeFile', 
                'message' => 'Selecione arquivo',
                'notEmpty',
            ]);
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array $data Form data.
     * @return bool
     */
    protected function _execute(array $data)
    {
        return true;
    }
}
