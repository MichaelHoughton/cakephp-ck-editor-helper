<?php
class CkHelper extends AppHelper {

    public $helpers = array('Html', 'Form');

/**
* Extention of the Form Helper to insert CK Editor for a form input
*
* @param string $input The name of the field, can be field_name or Model.field_name
* @param array $options Options include $options['label'] for a custom label - this can be expanded on if required
*/
    public function input($input, $options = array()) {
        if (!empty($options['div'])) {
            echo __('<div class="%s">', $options['div']);
        }

        echo $this->Html->script('//cdn.ckeditor.com/4.4.5.1/basic/ckeditor.js');

        $input = explode('.', $input);
        if (empty($input[1])) {
        	$field = $input[0];
        	$model = $this->Form->model();
        } else {
        	$model = $input[0];
        	$field = $input[1];
        }

        if (!empty($options['label'])) {
            echo $this->Form->label($model . '.' . $field, $options['label']);
        } else {
        	echo $this->Form->label($model . '.' . $field, Inflector::humanize(Inflector::underscore($field)));
        }

        if (!empty($options['value'])) {
            $this->request->data[$model][$field] = $options['value'];
        }

        echo $this->Form->error($model . '.' . $field);
        echo $this->Form->input($model . '.' . $field, array('type' => 'textarea', 'label' => false, 'error' => false, 'required' => false, 'div' => false));
		?>
			<script type="text/javascript">
				CKEDITOR.replace('<?php echo Inflector::camelize($model.'_'.$field); ?>');
			</script>

			<p>&nbsp;</p>
		<?php

        if (!empty($options['div'])) {
            echo '</div>';
        }
    }
}