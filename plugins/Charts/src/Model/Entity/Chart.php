<?php
namespace Charts\Model\Entity;
use Cake\ORM\Entity;

class Chart extends Entity
{
    private $data = [
        'type' => 'bar',
        'data' => [
            'labels' => ["Janeiro", "..."],
            'datasets'=>['label','data'],
        ],
        'options'=>[
            'responsive'=> true,
        ],
    ];

    // values default
    private $default_datasets =  [
        'label' => 'Grafico bar!',
        'data' => ['1','2'],
        "backgroundColor" => [
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(75, 192, 192, 0.6)'
        ]
    ];

    public function setType($value){
        $this->data['type'] = $value;
    }

    public function setLabels($value){
        $this->data['data']['labels'] = $value;
    }

    public function setDatasets($value){
        $this->data['data']['datasets'] = [
            array_replace_recursive(
                $this->default_datasets, 
                $value
            )];
    }

    public function setOptions($value){
        $this->data['data']['options'] = $value;
    }

    public function getCharts(){
        return (object)$this->data;
    }
}
