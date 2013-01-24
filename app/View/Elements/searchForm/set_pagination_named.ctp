<?php

$data_arr = array();
if (isset($this->params['url']) || isset($this->params['named'])) {
    $data = isset($this->params['named']) && !empty($this->params['named']) ? $this->params['named'] : $this->params['url'];
    $possibledata = array('name', 'id', 'text', 'body', 'username', 'created', 'title'); //possible fields
    foreach ($data as $key => $value) {
        if (in_array($key, $possibledata) && !empty($value)) {
            $data_arr[$key] = $data[$key];
        }
    }
}
?>
<?php

$this->Paginator->options(array(
    'evalScripts' => true,
    'url' => $data_arr
));
?>