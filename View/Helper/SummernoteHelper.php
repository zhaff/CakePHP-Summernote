<?php

class SummernoteHelper extends Helper {

    /**
     * Helpers for SummernoteHElper
     *
     * @var array
     */
    public $helpers = array(
        'Html',
        'Form'
    );

    /**
     * Configuration
     *
     * @var array
     */
    public $configs = array(
        'cssClass' => 'summernote',
        'lang' => 'en',
        'height' => '200',
        'toolbar' => 'complete',
        'inline' => false,
    );
    public $fields_count = 0;

    public function __construct(View $View, $options = array()) {
        parent::__construct($View, $options);
        $options = Configure::read('Summernote.config');
        if (!empty($configs) && is_array($configs)) {
            $this->configs = array_merge($configs, $options);
        }
    }

    public function afterRender($viewFile) {
        if (!empty($this->fields_count)) {
            //load editor
            $this->Html->css("Summernote.Summernote", null, array('inline' => false));
            $this->Html->script("Summernote.Summernote.min", array('inline' => false));
        }
    }

    public function render($fieldName, $options = array()) {
        $id = $this->domId($fieldName);
        if (!strpos($fieldName, ".")) {
            $id = ucfirst($this->Form->model()) . Inflector::camelize($id);
        }
        $options = array_merge($this->configs, $options);
        $js = "
            $(document).ready(function(){
				$('#" . $id . "').summernote({
                                    height: ". $options['height'] ."                                    
                                });
            });
        ";
        $this->fields_count = $this->fields_count + 1;
        $this->Html->scriptBlock($js, array("inline" => $options['inline']));
    }

}
